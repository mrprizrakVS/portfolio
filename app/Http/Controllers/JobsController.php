<?php

namespace App\Http\Controllers;

//use App\Models\Jobs;
use App\Models\Recruiters;
use App\Http\Requests\JobRequest;
use App\Repositories\JobRepository\IJobRepository;

class JobsController extends Controller
{
    private $model;
    /**
     * JobsController constructor.
     */
    public function __construct(IJobRepository $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = $this->model->getAll(10);

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
     * @param  \App\Http\Requests\JobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $this->model->create($request->all());

        return redirect(route('jobs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(Jobs $jobs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = $this->model->getById($id);
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
        $this->model->update($id, $request->all());
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
        $this->model->delete($id);
        return redirect(route('jobs'));
    }
}
