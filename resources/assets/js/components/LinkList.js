// @flow
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import LinkListItem from './LinkListItem';

type Link = {
  id: string,
  title: string,
  link: string
};

type Props = {
  links: Array<Link>,
  filter: string,
};

export default class LinkList extends Component<Props> {
  render() {
    let itemNodes = this.props.links.filter((item) => {
      if (!this.props.filter) {
        return true;
      }
      return item.title.toLowerCase().includes(this.props.filter.toLowerCase());
    }).map((item) => {
      return <LinkListItem key={item.id} link={item.link} title={item.title} />;
    });
    return (
      <ul id="links" className="list-group">
        {itemNodes}
      </ul>
    );
  }
}
