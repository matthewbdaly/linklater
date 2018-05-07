@extends('layouts.app')

@section('content')
<script type="text/javascript">
window.initialData = {
    links: {!! $links->toJson() !!},
    createUrl: '{{ url('create') }}',
    jwt: '{{ $jwt }}',
    graphql_route: "{{ config('app.url') }}/{{ config('graphql.prefix') }}"
};
</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="list"></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
