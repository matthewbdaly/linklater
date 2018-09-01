// @flow
import {List, Map, fromJS} from 'immutable';
import type {Action} from './types';

export default function(state = Map(), action: Action) {
  switch (action.type) {
  case 'ADD_LINK': {
    let links = state.get('links').push(fromJS(action.content));
    return state.set('links', links);
  }
  case 'UPDATE_FILTER':
    return state.set('filter', fromJS(action.content));
  default:
    return state;
  }
}
