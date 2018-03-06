<?php

namespace App\Http\Controllers;

use App\Model\Jobs;
use App\Model\Recruiters;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Jobs::all();

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recruiters = Recruiters::all();
        return view('jobs.create',compact('recruiters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        Jobs::create($request->all());
        return redirect(route('jobs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(Jobs $jobs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Jobs::findOrFail($id);
        $recruiters = Recruiters::all();
        return view('jobs.edit', compact('job', 'recruiters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\JobRequest  $request
     * @param    $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, $id)
    {
        Jobs::findOrFail($id)->update($request->all());
        return redirect(route('jobs'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Jobs::findOrFail($id);
        if(!empty($job)){
            Jobs::destroy($id);
        }
        return redirect(route('jobs'));
    }
}
