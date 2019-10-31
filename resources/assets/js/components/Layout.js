// @flow
import React from 'react';
import ReactDOM from 'react-dom';
import LinkList from './LinkList';
import LinkInput from './LinkInput';
import LinkFilter from './LinkFilter';
import Bookmarklet from './Bookmarklet';
import ErrorBoundary from './ErrorBoundary';
import type { Link } from '../Types';

type Props = {
  links: Array<Link>,
  createUrl: string,
  jwt: string,
  graphql_route: string,
  filter: string,
  storeLink: (link: string) => void,
  updateFilter: (filter: string) => void
};

const Layout = (props: Props) => {
  return (
    <div>
      <ErrorBoundary>
        <LinkInput {...props} />
        <Bookmarklet {...props} />
        <LinkFilter {...props} />
        <LinkList {...props} />
      </ErrorBoundary>
    </div>
  );
};

export default Layout;
