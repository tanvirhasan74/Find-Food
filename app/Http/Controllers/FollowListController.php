<?php

namespace App\Http\Controllers;

use App\follow_list;
use Illuminate\Http\Request;
use Auth;

class FollowListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "hello world";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(session('user')->id);
        if($request->action == 'follow')
          follow_list::make($request);
        else
          follow_list::deletes($request);

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\follow_list  $follow_list
     * @return \Illuminate\Http\Response
     */
    public function show(follow_list $follow_list)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\follow_list  $follow_list
     * @return \Illuminate\Http\Response
     */
    public function edit(follow_list $follow_list)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\follow_list  $follow_list
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, follow_list $follow_list)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\follow_list  $follow_list
     * @return \Illuminate\Http\Response
     */
    public function destroy(follow_list $follow_list)
    {
        //
    }
}
