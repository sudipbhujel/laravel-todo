<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Show the task list.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Add new task.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }

    /**
     * Delete the task.
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */

    public function delete($id)
    {
        Task::findOrFail($id)->delete();

        return redirect('/');
    }
}
