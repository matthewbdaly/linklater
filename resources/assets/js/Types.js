//@flow
import type {List} from 'immutable';

export opaque type Action = {
  type: 'ADD_LINK' | 'UPDATE_FILTER',
  content: mixed
};

export opaque type Link = {
  id: ?string,
  title: string,
  link: string
};

export opaque type StateMap = {
  links: List<Link>,
  filter: string,
  createUrl: string
}
