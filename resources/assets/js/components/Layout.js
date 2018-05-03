import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import LinkList from './LinkList';
import LinkInput from './LinkInput';

export default class Layout extends Component {
    render() {
        return (
            <div>
                <LinkInput />
                <LinkList {...this.props} />
            </div>
        );
    }
}
