<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\ChallengeUser;
use App\User;
use App\UserChallenge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallengeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $challenge = Challenge::find($request->challenge_id);

        $user = User::find(Auth::user()->user_id);
        $challenge_user = ChallengeUser::where('user_user_id',$user->user_id)->
        where('challenge_challenge_id',$challenge->challenge_id);
        if($challenge_user != null){
            $user->challenges()->attach($request->get('challenge_id'));
            $user->save();
            $updates = ['code_url'=> $request->get('code')];
            $challenge_user->update($updates);
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserChallenge  $userChallenge
     * @return \Illuminate\Http\Response
     */
    public function show(ChallengeUser $userChallenge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserChallenge  $userChallenge
     * @return \Illuminate\Http\Response
     */
    public function edit(ChallengeUser $userChallenge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserChallenge  $userChallenge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChallengeUser $userChallenge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserChallenge  $userChallenge
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChallengeUser $userChallenge)
    {
        //
    }
}
