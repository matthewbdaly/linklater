//@flow
import React, { Component } from 'react';

type Props = {
  children?: React.Node
}

type State = {
  hasError: boolean
};

export default class ErrorBoundary extends Component<Props, State> {
  constructor(props: Props) {
    super(props);
    this.state = {
      hasError: false
    };
  }
  componentDidCatch(error: Error, info: any) {
    this.setState({ hasError: true });
  }
  render() {
    if (this.state.hasError) {
      return (
        <h1>Something went wrong</h1>
      );
    }
    return this.props.children;
  }
}
