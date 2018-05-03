@extends('layouts.app')

@section('content')
<script type="text/javascript">
window.initialData = {
    links: {!! $links->toJson() !!}
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

                    <form method="GET" action="/create/">
                        <div class="form-group">
                            <input id="linkfilter" placeholder="Filter links..." class="form-control">
                            <button id="clear" class="btn btn-primary">Clear filter</button>
                        </div>
                    </form>

                    <p class="bookmarklet">
                        <a href="javascript:location.href='{{ url('create') }}?url='+encodeURIComponent(location.href)">LinkLater This!</a>
                    </p>
                    
                    <div id="list"></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
