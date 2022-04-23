@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('مرحـــبـا') }}
                {{__('!')}}
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user())
                        
                    
                    {{ __('مرحبا بك يا ') }}
                    {{Auth::user()->username}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
