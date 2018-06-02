import reducer from '../resources/assets/js/reducer';
import {List,Map,fromJS} from 'immutable';

describe('Reducer', () => {
  it('handles default path', () => {
    const initialState = Map();
    const action = {
      type: 'FOO',
    };
    const nextState = reducer(initialState, action);

    expect(nextState).toEqual(fromJS({
    }));
  });

  it('handles ADD_LINK', () => {
    const initialState = Map({
      links: List()
    });
    const action = {
      type: 'ADD_LINK',
      content: 'Foo'
    };
    const nextState = reducer(initialState, action);

    expect(nextState).toEqual(fromJS({
      links: ['Foo']
    }));
  });

  it('handles UPDATE_FILTER', () => {
    const initialState = Map();
    const action = {
      type: 'UPDATE_FILTER',
      content: 'foo'
    };
    const nextState = reducer(initialState, action);

    expect(nextState).toEqual(fromJS({
      filter: 'foo'
    }));
  });
});
