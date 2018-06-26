// @flow
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import LinkList from './LinkList';
import LinkInput from './LinkInput';
import LinkFilter from './LinkFilter';
import Bookmarklet from './Bookmarklet';

type Link = {
  id: string,
  title: string,
  link: string
};

type Props = {
  links: Array<Link>,
  createUrl: string,
  jwt: string,
  graphql_route: string,
  filter: string,
  storeLink: (link: string) => void,
  updateFilter: (filter: string) => void
};

export default class Layout extends Component<Props> {
  render() {
    return (
      <div>
        <LinkInput {...this.props} />
        <Bookmarklet {...this.props} />
        <LinkFilter {...this.props} />
        <LinkList {...this.props} />
      </div>
    );
  }
}
