import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Bookmarklet extends Component {
    render() {
        let url = `javascript:location.href='${this.props.createUrl}?url='+encodeURIComponent(location.href)`;
        return (
            <p className="bookmarklet">
                <a href={url}>LinkLater This!</a>
            </p>
        );
    }
}
