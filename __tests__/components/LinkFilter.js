import React from 'react';
import {findDOMNode} from 'react-dom';
import LinkFilter from '../../resources/assets/js/components/LinkFilter';
import renderer from 'react-test-renderer';

describe('LinkFilter', () => {
  it('renders the link filter', () => {
    const update = jest.fn();
    const tree = renderer
      .create(<LinkFilter updateFilter={update} />)
      .toJSON();
    expect(tree).toMatchSnapshot();
  });
});
