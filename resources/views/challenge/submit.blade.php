@extends('layouts.app')
@section('content')

<body>
    <h1>Submit Code to Challenge</h1>

    <h2>Challenge : {{$challenge['title']}}</h2>
    <form method="post" action="{{action('ChallengeUserController@store')}}">
        {{csrf_field()}}
        <label for="code">Code :</label>
        <input type="text" name="code"/>
        <br>
        <input type="hidden" name="challenge_id" value="{{$challenge['challenge_id']}}"/>
        <button class="btn btn-primary" type="submit">Submit Code</button>
    </form>


</body>

@endsection
