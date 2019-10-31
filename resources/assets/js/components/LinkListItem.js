// @flow
import React from 'react';
import type { Link } from '../Types';

const LinkListItem = (props: Link) => {
  return (
    <li className="list-group-item">
      <a href={ props.link } target="_blank" rel="noopener noreferrer">{ props.title }</a>
    </li>
  );
};

export default LinkListItem;
