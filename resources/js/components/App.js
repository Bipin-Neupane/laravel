import React, { Component } from "react";
import ReactDOM from "react-dom";
import "./App.css";
import Pusher from "pusher-js";
import Peer from "simple-peer";

const APP_KEY = "074d818400dba417dcfd";
var localStream;

const Button = props => {
    return (
        <>
            <button className="btn btn-success btn-md mx-0" data-toggle="modal" data-target="#modalVideo">
                Call
            </button>
            {props.children}
        </>
    );
};

const Modal = props => {
    return (
        <div className="modal fade" id="modalVideo">
            <div className="modal-dialog modal-lg" role="document">
                <div className="modal-content">{props.children}</div>
            </div>
        </div>
    );
};

export default class App extends Component {
    constructor() {
        super();

        this.state = {
            hasMedia: false,
            otherUserId: false
        };

        this.user = window.user;
        this.user.stream = null;
        this.peers = {};

        this.setupPusher();

        this.callTo = this.callTo.bind(this);
        this.setupPusher = this.setupPusher.bind(this);
        this.startPeer = this.startPeer.bind(this);
    }

    getMedia = () => {
        return new Promise((res, rej) => {
            navigator.mediaDevices
                .getUserMedia({ video: true, audio: true })
                .then(stream => res(stream))
                .catch(err => this.setState({ hasMedia: false }));
        });
    };

    connect = async () => {
        await this.getMedia().then(stream => {
            this.setState({ hasMedia: true });
            this.user.stream = stream;
            localStream = stream;
            try {
                this.myVideo.srcObject = stream;
            } catch (e) {
                this.myVideo.src = URL.createObjectURL(stream);
            }
            this.myVideo.play();
        });
        this.callTo(window.conUser);
    };

    stop = () => {
        // this.connect();
        this.setState({ hasMedia: null });
        if (localStream.getVideoTracks) {
            localStream.getVideoTracks()[0].stop();
            this.myVideo.src = "";
            this.userVideo.src = "";
        }
    };

    setupPusher() {
        this.pusher = new Pusher(APP_KEY, {
            authEndpoint: "/pusher/auth",
            cluster: "ap2",
            auth: {
                params: this.user.id,
                headers: {
                    "X-CSRF-Token": window.csrfToken
                }
            }
        });

        this.channel = this.pusher.subscribe("presence-video-channel");

        this.channel.bind(`client-signal-${this.user.id}`, signal => {
            let peer = this.peers[signal.userId];

            // if peer is not already exists, we got an incoming call
            if (peer === undefined) {
                this.setState({ otherUserId: signal.userId });
                peer = this.startPeer(signal.userId, false);
            }

            peer.signal(signal.data);
        });
    }

    startPeer(userId, initiator = true) {
        const peer = new Peer({
            initiator,
            stream: this.user.stream,
            trickle: false
        });

        peer.on("signal", data => {
            this.channel.trigger(`client-signal-${userId}`, {
                type: "signal",
                userId: this.user.id,
                data: data
            });
        });

        peer.on("stream", stream => {
            this.setState({ otherUserId: true });
            try {
                this.userVideo.srcObject = stream;
            } catch (e) {
                this.userVideo.src = URL.createObjectURL(stream);
            }

            this.userVideo.play();
        });

        peer.on("close", () => {
            let peer = this.peers[userId];
            if (peer !== undefined) {
                peer.destroy();
            }

            this.peers[userId] = undefined;
        });

        return peer;
    }

    callTo(userId) {
        this.peers[userId] = this.startPeer(userId);
    }

    allow = (
        <>
            <div className="modal-body pb-1 main-vid">
                <video
                    className="my-video"
                    ref={ref => {
                        this.myVideo = ref;
                    }}
                />
                <video
                    className="other-video"
                    ref={ref => {
                        this.userVideo = ref;
                    }}
                />
            </div>
            <p className="text-muted mb-0 pl-2">
                <small>Close through "CLOSE" button or else it wont fully stop.</small>
            </p>
            <div className="modal-footer m-0 py-0">
                <button className="btn btn-secondary btn-sm" data-dismiss="modal" onClick={this.stop}>
                    Close
                </button>
                <button className="btn btn-primary btn-sm" onClick={this.connect}>
                    Call
                </button>
            </div>
        </>
    );

    err = (
        <>
            <div className="modal-header m-0 py-0 bg-danger">
                <h3 className="mb-0 text-white">Error</h3>
            </div>
            <div className="modal-body text-center">
                <p className="mb-0">Please enable your webcam and mic and reload to use this feature.</p>
            </div>
        </>
    );

    render() {
        return (
            <Button>
                <Modal>{this.allow}</Modal>
            </Button>
        );
    }
}

if (document.getElementById("videoChat")) {
    ReactDOM.render(<App />, document.getElementById("videoChat"));
}
