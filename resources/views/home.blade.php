<link rel="stylesheet" href="assets/css/home.css">

@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">{{ __('Titulo del card') }}</div>
                    <div class="card-body">
                        <img src="assets/img/logo.png" alt="">
                        <br>
                        @guest

                            {{ session('status') }}
                            {{ __('You are not logged in!') }}
                        @else
                            {{ __('Aqui van los cards')}}
                        @endguest
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">{{ __('Titulo del card') }}</div>
                    <div class="card-body">
                        <img src="assets/img/logo.png" alt="">
                        <br>
                        @guest

                            {{ session('status') }}
                            {{ __('You are not logged in!') }}
                        @else
                            {{ __('Aqui van los cards')}}
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
