import React from 'react';
import {findDOMNode} from 'react-dom';
import Bookmarklet from '../../resources/assets/js/components/Bookmarklet';
import renderer from 'react-test-renderer';

describe('Bookmarklet', () => {
  it('renders the bookmarklet', () => {
    const tree = renderer
      .create(<Bookmarklet />)
      .toJSON();
    expect(tree).toMatchSnapshot();
  });
});
