import React from 'react';
import {findDOMNode} from 'react-dom';
import LinkList from '../../resources/assets/js/components/LinkList';
import renderer from 'react-test-renderer';

describe('LinkList', () => {
  it('renders the link list', () => {
    const tree = renderer
      .create(<LinkList links={[]} />)
      .toJSON();
    expect(tree).toMatchSnapshot();
  });
});
