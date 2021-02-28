<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
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
        //for check user
        /*  $user = User::find(Auth::user()->id); */

        $worker = new Worker();

        $worker->full_name = $request->full_name;
        $worker->position = $request->position;
        /*  $worker->employment_date = $request->employment_date; */
        $worker->employment_date = date("m.d.y");
        $worker->telephone = $request->telephone;
        $worker->email = $request->email;
        $worker->salary = $request->salary;

        /*  if ($files = $request->file('image')) {
            $destinationPath = 'upload'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $worker->photo = $profileImage;
        } */

        /*  $worker->admin_created_id = $user->id;
        $worker->admin_updated_id = $user->id; */

        $worker->admin_created_id = '1';
        $worker->admin_updated_id = '1';

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
        /*  $user = User::find(Auth::user()->id); */
        Worker::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'full_name' => $request->full_name,
                'position' => $request->position,
                'employment_date' => $request->employment_date,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'salary' => $request->salary,
                'admin_updated_id' => '2'
                /* $worker->admin_updated_id = $user->id;  */
            ]
        );

        return response()->json(['success' => true]);
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
        
        return response()->json([
            'data' => $worker
        ]);
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
