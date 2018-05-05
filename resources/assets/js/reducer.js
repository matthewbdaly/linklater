import {List, Map} from 'immutable';

export default function(state = Map(), action) {
    switch (action.type) {
        case 'ADD_LINK':
            return state.get('links').push(action.content);
        default:
            return state;
    }
}
