<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Course;

Route::get('/test', function () {
    $id = Auth::id();
    $data = Course::all()->where('user_id', '=', $id);
    return response()->json($data);
});

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     $id = Auth::id();
//     $data = Course::all()->where('user_id', '=', $id);
//     return view('dashboard.dashboard', ['course' => $data]);
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/course', function(){

    return view('courses.course');
});


Route::get('/quiz', function(){
    return view('activities.quiz');
});

/**
 *  User profile routes
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
