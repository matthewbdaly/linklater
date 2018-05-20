import {Map} from 'immutable';
import client from './client';
import gql from 'graphql-tag';

export function addLink(title, link) {
    return {
        type: 'ADD_LINK',
        content: {
            title: title,
            link: link
        }
    };
}

export function getLinks() {
    client.query({
        query: gql`{
            links {
                id
                title
                link
            }}`
    }),then((result) => {return result});
}
