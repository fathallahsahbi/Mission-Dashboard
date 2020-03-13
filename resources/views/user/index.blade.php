@extends('layouts.app')
@section('content')
<h1> List of Users </h1>
<table class="table table-striped">
    <thead>
      <tr>
        <th>name</th>
        <th>email</th>
        <th>role</th>
        <th>edit</th>
        <th>delete</th>

      </tr>
    </thead>
    <tbody>
      @forelse($users as $user)
      <tr>
        <td>{{$user['name']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$user['role']}}</td>
        <td><a href="{{action('UserController@edit', $user['user_id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                <form action="{{action('UserController@destroy', $user['user_id'])}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
      </tr>
      @empty
       No user in database.
      @endforelse

    </tbody>
  </table>

@endsection
