<?php

namespace App\Http\Controllers;

use App\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $challenges = Challenge::paginate(5);
        return view('challenge.index',compact('challenges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('challenge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'keyword'=>'required',
            'period'=>'required',
            'title'=>'required',
            'description'=>'required',
            'deadline'=>'required|date'
        ]);
        $challenge = new Challenge();
        $challenge->keyword = $request->get('keyword');
        $challenge->period = $request->get('period');
        $challenge->title = $request->get('title');
        $challenge->description = $request->get('description');
        $challenge->deadline = $request->get('deadline');
        $challenge->save();
        return redirect('challenge')->with('success', 'Challenge has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function show(Challenge $challenge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Challenge  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $challenge = Challenge::find($id);
        return view('challenge.edit',compact('challenge','id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Challenge  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'keyword'=>'required',
            'period'=>'required',
            'title'=>'required',
            'description'=>'required',
            'deadline'=>'required|date',
            'status'=>'required'
        ]);
        $challenge = Challenge::find($id);
        $challenge->keyword = $request->get('keyword');
        $challenge->period = $request->get('period');
        $challenge->title = $request->get('title');
        $challenge->description = $request->get('description');
        $challenge->deadline = $request->get('deadline');
        $challenge->ongoing = $request->get('status');
        $challenge->save();
        return redirect('challenge');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Challenge  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $challenge = Challenge::find($id);
        $challenge->delete();
        return redirect('challenge')->with('success','Challenge has been deleted');
    }

    /**
     * Shows the submit code for challenge view (participant only)
     *
     *  @param \App\Challenge $id
     *  @return \Illuminate\Http\Response
     *
     */
    public function submit($id){
        $challenge = Challenge::find($id);
        return view('challenge.submit',compact('challenge','id'));
    }


}
