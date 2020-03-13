@extends('layouts.app')
@section('content')
    <h1>Edit Challenge </h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="{{route('challenge.edit',$id)}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="keyword">Keyword:</label>
            <input type="text" class="form-control" name="keyword" value="{{$challenge->keyword}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="period">Period:</label>
              <input type="text" class="form-control" name="period" value="{{$challenge->period}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title" value="{{$challenge->title}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description" value="{{$challenge->description}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="deadline">Deadline:</label>
            <input type="date" class="form-control" name="deadline" value="{{$challenge->deadline}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="status">Status:</label>
              <select name="status">
                  <option value="1" @if($challenge->ongoing == "1") selected @endif>Ongoing </option>
                  <option value="0" @if($challenge->ongoing == "0") selected @endif>Done </option>
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
