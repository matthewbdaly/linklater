import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class LinkInput extends Component {
    render() {
        return (
            <div className="form-group">
                <label htmlFor="url" className="control-label">URL</label>
                <input type="url" name="url" placeholder="Page to save" className="form-control" required autoComplete="off"></input>
                <button type="submit" className="btn btn-primary">
                    Submit
                </button>
            </div>
        );
    }
}
