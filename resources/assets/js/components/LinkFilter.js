import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class LinkFilter extends Component {
    render() {
        return (
            <div className="form-group">
                <input id="linkfilter" placeholder="Filter links..." className="form-control" />
                <button id="clear" className="btn btn-primary">Clear filter</button>
            </div>
        );
    }
}
