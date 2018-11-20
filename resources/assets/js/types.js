import type {List} from 'immutable';

export type Action = {
  type: 'ADD_LINK' | 'UPDATE_FILTER',
  content: mixed
};

export type StateMap = {
  links: List,
  filter: string,
  createUrl: string
}
