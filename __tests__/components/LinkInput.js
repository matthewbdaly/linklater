import React from 'react';
import {findDOMNode} from 'react-dom';
import LinkInput from '../../resources/assets/js/components/LinkInput';
import renderer from 'react-test-renderer';
import { mount, configure } from 'enzyme';
import Adapter from 'enzyme-adapter-react-16';

configure({ adapter: new Adapter() });

describe('LinkInput', () => {
  it('renders the link input', () => {
    const store = jest.fn();
    const tree = renderer
      .create(<LinkInput storeLink={store} />)
      .toJSON();
    expect(tree).toMatchSnapshot();
  });

  it('handles submit', () => {
    const store = jest.fn();
    const wrapper = mount(<LinkInput storeLink={store} />);
    wrapper.find('button').simulate('click', {
      preventDefault: () => {
    }});
    expect(store).toBeCalled();
  });
});
