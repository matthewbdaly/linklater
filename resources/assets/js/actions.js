import {Map} from 'immutable';

export function addLink(title, link) {
    return {
        type: 'ADD_LINK',
        content: {
            title: title,
            link: link
        }
    };
}
