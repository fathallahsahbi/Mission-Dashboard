@extends('layouts.app')
@section('content')
    <h1>Edit User </h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="{{route('user.edit',$id)}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email" value="{{$user->email}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="role">Role:</label>
              <select name="role">
                  <option value="guest" @if($user->role == 'guest') selected @endif>Guest </option>
                  <option value="organizer" @if($user->role == 'organizer') selected @endif>Organizer </option>
                  <option value="participant" @if($user->role == 'participant') selected @endif> Participant </option>
                  <option value="admin" @if ($user->role == 'admin') selected @endif> Admin </option>
              </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <button type="submit" class="btn btn-success" style="margin-left:38px">Edit</button>
            </div>
          </div>
    </form>
@endsection
