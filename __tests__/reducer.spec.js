import reducer from '../resources/assets/js/reducer';
import {Map, fromJS} from 'immutable';

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
