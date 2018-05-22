import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class LinkFilter extends Component {
    constructor(props) {
        super(props);
        this.filterRef = React.createRef();
        this.updateFilter = this.updateFilter.bind(this);
    }
    updateFilter(e) {
        e.preventDefault();
        let filter = this.filterRef.current.value.trim();
        this.props.updateFilter(filter);
    }
    render() {
        return (
            <div className="form-group">
                <input id="linkfilter" placeholder="Filter links..." className="form-control" ref={this.filterRef} onChange={this.updateFilter} />
                <button id="clear" className="btn btn-primary">Clear filter</button>
            </div>
        );
    }
}
