// @flow
import {connect} from 'react-redux';
import Layout from './components/Layout';
import * as actions from './actions';

export const Container = connect(
  function mapStateToProps(state) {
    return {
      links: state.get('links').toJS(),
      filter: state.get('filter'),
      createUrl: state.get('createUrl')
    };
  },
  actions
)(Layout);
