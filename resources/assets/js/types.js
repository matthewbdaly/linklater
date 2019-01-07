//@flow
import type {List} from 'immutable';

export opaque type Action = {
  type: 'ADD_LINK' | 'UPDATE_FILTER',
  content: mixed
};

export opaque type StateMap = {
  links: List,
  filter: string,
  createUrl: string
}
