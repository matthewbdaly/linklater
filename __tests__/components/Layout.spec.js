import React from 'react';
import {findDOMNode} from 'react-dom';
import Layout from '../../resources/assets/js/components/Layout';
import renderer from 'react-test-renderer';

describe('Layout', () => {
  it('renders the layout', () => {
    const tree = renderer
      .create(<Layout filter='' links={[]} jwt='' graphql_route='' createUrl='' />)
      .toJSON();
    expect(tree).toMatchSnapshot();
  });
});
