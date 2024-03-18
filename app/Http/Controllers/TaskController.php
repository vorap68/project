<?php

namespace App\Http\Controllers;

use App\Exceptions\MyException;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use App\Models\User;
use App\Providers\DisconnectTaskbusy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;


class TaskController extends Controller
{
     /**
     * Method  show all tasks for this category
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $todosInCategory = $category->tasks;
        return view('category.index', compact('todosInCategory'));
    }

    /**
     * Method  for change share one task for any users
     */
    public  static function share(Task $task)
    {
        $users = User::all();
        $usersAccess = array();
        foreach ($task->users as $user) {
            $usersAccess[] = $user->name;
        }
        return view('task.share', compact('users', 'task', 'usersAccess'));
    }

    /**
     * Method  for save share one task for any users
     */
    public  static function shareStore(Request $request, Task $task)
    {
        $params[] = $request->all();
        $params = array_keys($params[0]);
        array_shift($params);

        $task->users()->sync($params);
        return redirect()->route('home');
    }

    /**
     * Method setup doneAndClosed for this task
     */

    public function closed( Task $task)
    {
        $task->update([
            'done'=> 1,
        ]);
        return redirect()->back();
    }

    /**
     * Method create task
     */
    public function create(Category $category)
    {
        return view('task.create', compact('category'));
    }

    /**
     * Method save new task
     */
    public function store(Request $request, Category $category)
    {
        $params = $request->all();
        //dd($params);
        $params['category_id'] = $category->id;
        $params['user_id'] = Auth::user()->id;
        $task = Task::create($params);
       if ($task && array_key_exists('nextTask',$params)) {
           // dd('addTask');
            return redirect()->back();
        } elseif($task) {
            return redirect()->route('home');
        }else{
            dd("error");
        }
    }

    /**
     * Method  show one task
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Task $task)
    {
        return view('show', compact('category', 'task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //dd($task->busy);
        if($task->busy == 1){
            throw new MyException($task);
        }else{
            $task->update(['busy' => 1]);
            event(new DisconnectTaskbusy($task));
            return view('task.edit', compact('task'));
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
       $params = $request->all();
      //dd($params);
      $params['busy'] =  0;
      $task->update($params);
     return redirect()->route('home');


}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        Task::destroy($task->id);
        return redirect()->route('home');
    }

    public function manage(Category $category)
    {

        $tasks_id = $category->tasks()->where('user_id',Auth::user()->id)->pluck('id');
        $tasksTemp = $tasks_id->toArray();

         $tasksUsers = DB::table('task_user')->where('user_id',Auth::user()->id)->pluck('task_id');

         $tasksUsersTemp = $tasksUsers->toArray();
         $tasksEdit = array_merge( $tasksTemp,$tasksUsersTemp);
         $tasks = Task::find($tasksEdit);


       return view('task.index', compact('tasks'));
    }
}
