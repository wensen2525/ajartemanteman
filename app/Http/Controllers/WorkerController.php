<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;
use App\Http\Requests\StoreWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index($worker)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobs = Job::all();
        return view('workers.create',[
            'jobs' => $jobs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'job' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'age' => $request->age,
        ]);
        
        $user = User::where('name', '=', $request->name)->first();
        $job = Job::find($request->job);

        Worker::create([
            'user_id' => $user->id,
            'job_id' => $job->id,
        ]);
        return redirect()->route('home.index')->with('success', 'Data successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Worker $worker)
    {
        $jobs = Job::all();
        return view('workers.edit',[
            'worker' => $worker,
            'jobs' => $jobs
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Worker $worker)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'job' => 'required',
        ]);

        $worker->user->update([
            'name' => $request->name,
            'age' => $request->age,
        ]);

        $job = Job::find($request->job);

        $worker->update([
            'job_id' => $job->id,
        ]);
        return redirect()->route('home.index')->with('success', 'Data successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        Worker::destroy($worker->id);
        return redirect()->route('home.index')->with('danger', 'Data successfully deleted!');
    }
}
