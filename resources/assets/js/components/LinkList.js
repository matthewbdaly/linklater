import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import LinkListItem from './LinkListItem';

export default class LinkList extends Component {
    render() {
        let itemNodes = this.props.items.map((item) => {
            return <LinkListItem link={item.link} title={item.title} />;
        });
        return (
            <ul id="links" className="list-group">
                {itemNodes}
            </ul>
        );
    }
}
