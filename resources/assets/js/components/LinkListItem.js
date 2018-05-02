import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class LinkListItem extends Component {
    render(){
        return (
            <li className="list-group-item">
                <a href="{ this.props.link }" target="_blank">{ this.props.title }</a>
            </li>
        );
    }
}
