import React from 'react';
import {findDOMNode} from 'react-dom';
import LinkList from '../../resources/assets/js/components/LinkList';
import renderer from 'react-test-renderer';

const links = [{
  title: 'My link',
  link: 'http://example.com',
  id: 1
}, {
  title: 'Something else',
  link: 'https://example.com',
  id: 2
}];
describe('LinkList', () => {
  it('renders the link list', () => {
    const filter = '';
    const tree = renderer
      .create(<LinkList filter={filter} links={links} />)
      .toJSON();
    expect(tree).toMatchSnapshot();
  });

  it('renders a non-empty list', () => {
    const filter = 'My link';
    const tree = renderer
      .create(<LinkList filter={filter} links={links} />)
      .toJSON();
    expect(tree).toMatchSnapshot();
  });
});
