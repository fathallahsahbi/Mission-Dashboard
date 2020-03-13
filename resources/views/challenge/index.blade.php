@extends('layouts.app')
@section('content')
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
    <script>
       $(document).ready(function(){
        var datatable = $("#challenges").DataTable({
            "paging" : false
        });
       });
    </script>

    <body>
        <h1>List of Challenges </h1>


        <table id="challenges" class="table table-striped">
            <thead>
                <th>keyword</th>
                <th>status</th>
                <th>period</th>
                <th>title</th>
                <th>description</th>
                <th>deadline</th>
                @if(Auth::user()->role == 'admin' || Auth::user()->role == 'organizer')
                <th>edit</th>
                <th>delete</th>
                @elseif(Auth::user()->role == 'participant')
                <th>Submit</th>
                @endif
            </thead>
            <tbody>
              @foreach($challenges as $challenge)
              <tr>
                <td>{{$challenge['keyword']}}</td>
                <td>
                    @if($challenge['ongoing'] === 1)
                        <span class="badge badge-primary">Ongoing</span>
                    @else
                        <span class="badge badge-secondary">Done</span>
                    @endif
                </td>
                <td>{{$challenge['period']}}</td>
                <td>{{$challenge['title']}}</td>
                <td>{{$challenge['description'] }}</td>
                <td>{{$challenge['deadline']}}</td>
                @if(Auth::user()->role == 'admin')
                <td><a href="{{action('ChallengeController@edit', $challenge['challenge_id'])}}" class="btn btn-secondary">Edit</a></td>
                <td>
                <form action="{{action('ChallengeController@destroy', $challenge['challenge_id'])}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
                @elseif(Auth::user()->role == 'participant' && $challenge['deadline'] > Carbon\Carbon::today() && $challenge['ongoing'] == 1)
                <td><a href="{{action('ChallengeController@submit',$challenge['challenge_id'])}}" class="btn btn-primary">Submit</a></td>
                @else
                <td></td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$challenges->links()}}
          <br>
          @if(Auth::user()->role == 'admin' || Auth::user()->role == 'organizer')
            <a class="btn btn-primary" href="{{action('ChallengeController@create')}}">Add Challenge</a>
          @endif
          @endsection
