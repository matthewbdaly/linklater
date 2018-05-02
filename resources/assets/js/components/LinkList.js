import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import LinkListItem from './LinkListItem';

export default class LinkList extends Component {
    render() {
        let itemNodes = this.props.links.map((item) => {
            return <LinkListItem key={item.id} link={item.link} title={item.title} />;
        });
        return (
            <ul id="links" className="list-group">
                {itemNodes}
            </ul>
        );
    }
}
