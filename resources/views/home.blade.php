@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   @if(Auth::user()->is_admin)
                       <p>This is an admin account</p>
                        @else
                            <p>this is a normal account</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
