// @flow
import React from 'react';
import LinkListItem from './LinkListItem';
import type { Link } from '../Types';

type Props = {
  links: Array<Link>,
  filter: string,
};

const LinkList = (props: Props) => {
  let itemNodes = props.links.filter((item) => {
    if (!props.filter) {
      return true;
    }
    return item.title.toLowerCase().includes(props.filter.toLowerCase());
  }).map((item) => {
    return <LinkListItem key={item.id} link={item.link} title={item.title} />;
  });
  return (
    <ul id="links" className="list-group">
      {itemNodes}
    </ul>
  );
};

export default LinkList;
