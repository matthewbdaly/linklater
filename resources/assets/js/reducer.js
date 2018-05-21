import {List, Map, fromJS} from 'immutable';

export default function(state = Map(), action) {
    switch (action.type) {
        case 'ADD_LINK':
            let links = state.get('links').push(fromJS(action.content));
            return state.set('links', links);
        default:
            return state;
    }
}
