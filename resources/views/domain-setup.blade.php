@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Custom Domain</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {!! session('status') !!}
                        </div>
                    @endif
                    @if (count($errors->all()) > 0)
                          <div class="alert alert-danger">
                              {{ $errors->first() }}
                          </div>
                    @endif

                    @if(! is_null(Auth::user()->domain))
                  		<form class="text-center" method="POST">
                          {{ csrf_field() }}
                          <input class="form-control" name="domain" type="text" placeholder="yourdomain.com" value="{{ old('domain') }}" required>
                          <br>
                          <button type="submit" class="btn btn-primary">Setup Custom Domain</button>
                  		</form>
                  	@else
                  <p>You have setup <b>{{ Auth::user()->domain }}</b> as your custom domain.</p>
                  	@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection