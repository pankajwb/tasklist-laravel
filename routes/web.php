<?php

use \App\Http\Requests\TaskRequest;
use \App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index',[
        'tasks' => Task::latest()->paginate(5)
    ]);
})->name('tasks.index');

Route::view('/tasks/create','create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function(Task $task){

    return view('edit', ['task' => $task]);
 })->name('tasks.edit');

Route::get('/tasks/{task}', function(Task $task){

   return view('show', ['task' => $task]);
})->name('tasks.show');

Route::post('/tasks',function(TaskRequest $request) {

    $data = $request->validated();

    $task = Task::create($data);
    return redirect()
        ->route('tasks.show',['task'=>$task->id])
        ->with('success', 'Task Created!');
})->name('tasks.store');

//DELETE ROUTE
Route::delete('/tasks/{task}', function(Task $task){
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success','Task Deleted!');
})->name('tasks.destroy');

//TOGGLE ROUTE
Route::put('/tasks/{task}/toggle-complete',function(Task $task){
    $task->toggleComplete();

    return redirect()->back()
    ->with('success', 'Task Toggle completed!');
})->name('tasks.toggle');


Route::put('/tasks/{task}',function(Task $task, TaskRequest $request) {
    $data = $request->validated();

    $task->update($data);

    return redirect()
        ->route('tasks.show',['task'=>$task->id])
        ->with('success', 'Task has been Updated!');
})->name('tasks.update');

Route::fallback(function () {
    return 'Still got somewhere!';
});
