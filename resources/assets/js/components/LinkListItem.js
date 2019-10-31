// @flow
import React from 'react';

type Props = {
  link: string,
  title: string
};

const LinkListItem = (props: Props) => {
  return (
    <li className="list-group-item">
      <a href={ props.link } target="_blank" rel="noopener noreferrer">{ props.title }</a>
    </li>
  );
};

export default LinkListItem;
