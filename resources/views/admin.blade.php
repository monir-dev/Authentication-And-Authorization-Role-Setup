@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin  Dashboard</div>

                <div class="panel-body">
                    You are logged in as admin!
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Visitor</th>
                    <th>Admin</th>
                    <th>Author</th>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <form class="" action="{{ route('admin.assign') }}" method="post">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                                <td><input type="checkbox" name="role_visitor" {{ $user->hasRole('Visitor') ? 'checked' : '' }}></td>
                                <td><input type="checkbox" name="role_admin" {{ $user->hasRole('Admin') ? 'checked' : '' }}></td>
                                <td><input type="checkbox" name="role_author" {{ $user->hasRole('Author') ? 'checked' : '' }}></td>

                                {{ csrf_field() }}
                                <td><button type="submit">Assign roles</button></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
