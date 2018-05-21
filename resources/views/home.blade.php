@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- You are logged in! -->

                    @if (Auth::user()->role_id == "2")
                        <a class="dropdown-item" href="{{ route('users') }}"> {{ __('User List') }} </a>
                        <a class="dropdown-item" href="{{ route('contacts') }}" target="_new"> {{ __('Contact List') }} </a>
                    @endif

                    <a class="dropdown-item" href="{{ route('contact') }}"> {{ __('My Contact') }} </a>
                    
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
