<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *Task一覧
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::orderByDesc('id')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TaskRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TaskRequest $request)
    {
        $task = Task::create(Request->all());

        return $task
            ? response()->json($task, 201)
            : response()->json([], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(TaskRequest $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \TaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->title = $request->title;

        return $task->update()
            ? response()->json($task)
            : response()->json([], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Task $task)
    {
        return $task->delete()
            ? response()->json($task)
            : response()->json([], 500);
    }
}
