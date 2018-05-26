// @flow
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

type Props = {
  link: string,
  title: string
};

export default class LinkListItem extends Component<Props> {
  render(){
    return (
      <li className="list-group-item">
        <a href={ this.props.link } target="_blank">{ this.props.title }</a>
      </li>
    );
  }
}
