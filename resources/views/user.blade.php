@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('users/') }}">{{ __('User List') }}</a> &gt;&gt; {{ __('User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('user/'.$user->id) }}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                         <div class="form-group row">
                            <label for="UID" class="col-md-4 col-form-label text-md-right">{{ __('UID') }}</label>
                            <div class="col-md-6">
                                {{ $user->id }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                @if ($user->id != Auth::user()->id)
                                <select id="role" name="role">
                                    <option value="1" @if ($user->role_id == 1)
                                        selected @endif
                                        >Normal</option>>
                                    <option value="2" @if ($user->role_id == 2)
                                        selected @endif
                                    >Administrator</option>>
                                </select>
                                @else
                                    {{ $user->getRoleNameAttribute() }}
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CreatedBy" class="col-md-4 col-form-label text-md-right">{{ __('Created at') }}</label>
                            <div class="col-md-6">
                                {{ $user->created_at }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="UpdatedBy" class="col-md-4 col-form-label text-md-right">{{ __('Updated at') }}</label>
                            <div class="col-md-6">
                                {{ $user->updated_at }}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                @if (count($errors) > 0)
                                <strong>{!! implode('<br>', $errors->all()) !!}</strong>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
