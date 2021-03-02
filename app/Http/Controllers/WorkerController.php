<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class WorkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $worker = Worker::orderBy('updated_at', 'desc')->get();

        return view('table', ['worker' => $worker]);
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

        /*  $request->validate([
            'full_name' => 'required|max:256',
            'position' => 'required',
            'employment_date' => 'required|max:255',
            'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:12|max:12',
            'email' => 'required|email',
            'salary' => 'required|max:50 000',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]); */


        //for check user
        $user = User::find(Auth::user()->id);

        $worker = new Worker();

        $worker->full_name = $request->full_name;
        $worker->position = $request->position;
        $worker->employment_date = $request->employment_date;

        $worker->telephone = $request->telephone;
        $worker->email = $request->email;
        $worker->salary = $request->salary;

        if ($files = $request->file('image')) {
            $destinationPath = 'upload'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $worker->image = $profileImage;
        }

        $worker->admin_created_id = $user->id;
        $worker->admin_updated_id = $user->id;

        if (
            $request->full_name && $request->position && $request->employment_date
            && $request->telephone && $request->email && $request->salary
        )
            $worker->save();
        return redirect('admin/worker');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);

        $worker = Worker::find($id);

        $worker->full_name = $request->full_name;
        $worker->position = $request->position;
        $worker->employment_date = $request->employment_date;

        $worker->telephone = $request->telephone;
        $worker->email = $request->email;
        $worker->salary = $request->salary;

        if ($request->file('image')) {
            if ($files = $request->file('image')) {
                $destinationPath = 'upload'; // upload path
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $worker->image = $profileImage;
            }
        }

      
        $worker->admin_updated_id = $user->id;

        if (
            $request->full_name && $request->position && $request->employment_date
            && $request->telephone && $request->email && $request->salary
        )
            $worker->save();

        return redirect('admin/worker');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker = Worker::find($id);

        return view('edit', ['worker' => $worker]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = Worker::find($id);
        $worker->delete();

        return redirect('admin/worker');
    }
}
