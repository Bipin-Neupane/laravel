import React, { Component } from "react";
import ReactDOM from "react-dom";

const Main = () => {
    return <p>Hello there how do you do</p>;
};

if (document.getElementById("root")) {
    ReactDOM.render(<Main />, document.getElementById("root"));
}
