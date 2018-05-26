import React from 'react';
import {findDOMNode} from 'react-dom';
import LinkListItem from '../../resources/assets/js/components/LinkListItem';
import renderer from 'react-test-renderer';

describe('LinkListItem', () => {
  it('renders the link list item', () => {
    const tree = renderer
      .create(<LinkListItem link='' title='' />)
      .toJSON();
    expect(tree).toMatchSnapshot();
  });
});
