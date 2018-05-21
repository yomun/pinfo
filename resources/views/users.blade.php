@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action="{{ route('users') }}">
                @csrf
                <div class="card-header">{{ __('User List') }}
                    &nbsp;(<button type="submit" class="btn btn-link">{{ __('Json Format') }}</button>)
                </div>
                </form>

                <div class="card-body">
                        <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{ __('UID') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('E-Mail Address') }}</th>
                            <th>{{ __('Role') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->getRoleNameAttribute() }}</td>
                            <td>
                                <a href="{{ url('user/'.$user->id.'/edit') }}" class="btn btn-success">Edit</a>

                                @if ($user->id != Auth::user()->id)
                                <form action="{{ url('user/'.$user->id) }}" method="POST" style="display: inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success">Delete X</button>
                                </form>
                                @else
                                <button class="btn btn-success" disabled>Delete X</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
