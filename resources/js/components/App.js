import React, { Component } from "react";
import ReactDOM from "react-dom";
import "./App.css";
import Pusher from "pusher-js";
import Peer from "simple-peer";

const APP_KEY = "83c9614fa128f8d6027a";
var localStream;

const Button = props => {
    return (
        <>
            <button data-toggle="modal" data-target="#modalVideo">
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
    state = { hasMedia: null };

    getMedia = () => {
        return new Promise((res, rej) => {
            navigator.mediaDevices
                .getUserMedia({ video: true, audio: true })
                .then(stream => res(stream))
                .catch(err => this.setState({ hasMedia: false }));
        });
    };

    connect = () => {
        this.getMedia().then(stream => {
            this.setState({ hasMedia: true });
            localStream = stream;
            try {
                this.myVideo.srcObject = stream;
            } catch (e) {
                this.myVideo.src = URL.createObjectURL(stream);
            }
            this.myVideo.play();
        });
    };

    stop = () => {
        this.setState({ hasMedia: null });
        if (localStream.getVideoTracks) {
            localStream.getVideoTracks()[0].stop();
            this.myVideo.src = "";
        }
    };

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
                        this.otherVideo = ref;
                    }}
                />
            </div>
            <p className="text-muted mb-0 pl-2">
                <small>
                    Close through "CLOSE" button or else it wont fully stop
                </small>
            </p>
            <div className="modal-footer m-0 py-0">
                <button
                    className="btn btn-secondary btn-sm"
                    data-dismiss="modal"
                    onClick={this.stop}
                >
                    Close
                </button>
                <button
                    className="btn btn-primary btn-sm"
                    onClick={this.connect}
                >
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
                <p className="mb-0">
                    Please enable your webcam and mic and reload to use this
                    feature.
                </p>
            </div>
        </>
    );

    render() {
        return (
            <Button>
                <Modal>
                    {this.state.hasMedia === false ? this.err : this.allow}
                </Modal>
            </Button>
        );
    }
}

if (document.getElementById("videoChat")) {
    ReactDOM.render(<App />, document.getElementById("videoChat"));
}
