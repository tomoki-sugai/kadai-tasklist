<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;  

class TasksController extends Controller
{
   
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
            $data += $this->counts($user);
            return view('tasks.index', $data);
        }else {
            return view('welcome');
        }
    }


    
    public function create()
  {
if (\Auth::check()){
        $task = new Task;
 if (\Auth::user()->id === $task->user_id){
        return view('tasks.create', [
            'task' => $task,
        ]);
 }
        else{
        return redirect ('/');
    }
}
else{
        return redirect ('/');
    }
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $request)
     {
        $this->validate($request, [
            'content' => 'required|max:191',
            'status' => 'required|max:10',
        ]);

        $request->user()->tasks()->create([
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
{
if (\Auth::check()){
        $task = Task::find($id);
        if (\Auth::user()->id === $task->user_id){
            
        return view('tasks.show', [
            'task' => $task,
        ]);
    }
    else{
        return redirect ('/');
    }
}
else{
        return redirect ('/');
    }
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
   {
if (\Auth::check()){
        $task = Task::find($id);
if (\Auth::user()->id === $task->user_id){
        return view('tasks.edit', [
            'task' => $task,
        ]);
    }
     else{
        return redirect ('/');
    }
}
else{
        return redirect ('/');
    }
}
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|max:191',   // add
            'content' => 'required|max:191',
        ]);


        $task = Task::find($id);
        $task->status = $request->status;    // add
        $task->content = $request->content;
        $task->save();


        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
     {
        $task = \App\Task::find($id);

        if (\Auth::user()->id === $task->user_id) {
            $task->delete();
        }

        return redirect('/');
    }
}
