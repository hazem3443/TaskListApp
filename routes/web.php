<?php
use App\Task;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['uses'=>'TasksController@index'] );

/**
 * Add A New Task
 */
Route::post('/task', function (Request $request) {
	$validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    // Create The Task...
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', function ($id) {
    //findOrFail method to retrieve a model by ID or throw a 404 exception if the model does not exist.
    Task::findOrFail($id)->delete();

    return redirect('/');
});

Route::put('/task/edit/{id}', ['uses'=>'TasksEdit@edit'] );