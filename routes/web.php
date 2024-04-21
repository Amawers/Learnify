<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $data = User::find(Auth::id())->select('id')->first();
    $courseDataArr = array ();
    foreach ($data->courses as $course) {
        $courseId = $course->id;
        $imagePath = $course->image_path;
        $instructorName = $course->instructor_name;
        $title = $course->title;
        $progress = $course->progress;

        array_push($courseDataArr, ['course_id' => $courseId, 'instructor_name' => $instructorName, 'image_path' => $imagePath, 'title' => $title, 'progress' => $progress]);
    }
    return view('dashboard.dashboard', ['course' => $courseDataArr]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/course/{course_id}', function ($course_id) {
    $course = Course::find($course_id);
    $courseDetail = Course::find($course_id)->course_detail;
    $courseObjective = Course::find($course_id)->course_objective;
    $objectivesArr = array ();
    foreach ($courseObjective as $objective) {
        array_push($objectivesArr, $objective->objective);
    }

    $courseTopic = Course::find($course_id)->course_topic;
    $topicsArr = array ();
    foreach ($courseTopic as $topic) {
        array_push($topicsArr, $topic->topic);
    }

    $learningMaterial = Course::find($course_id)->learning_material;
    $materialsArr = array ();
    foreach ($learningMaterial as $material) {
        array_push($materialsArr, $material->lesson_name);
    }

    $files = Course::find($course_id)->files;
    $filesArr = array ();
    foreach ($files as $files) {
        array_push($filesArr, $files->file_name);
    }

    $activities = Course::find($course_id)->activities;
    $activitiesArr = array ();
    foreach ($activities as $activity) {
        array_push($activitiesArr, $activity->quiz_name);
    }

    $forums = Course::find($course_id)->forums;
    $forumsArr = array ();
    foreach ($forums as $forum) {
        array_push($forumsArr, $forum->post, $forum->reply);
    }

    return view('courses.course', ['instructor_name' => $course->instructor_name, 'title' => $course->title, 'description' => $courseDetail->first()->description, 'objectives' => $objectivesArr, 'topics' => $topicsArr, 'materials' => $materialsArr, 'activities' => $activitiesArr, 'files' => $filesArr, 'forums' => $forumsArr]);
})->name('course');


Route::get('/quiz', function () {
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

require __DIR__ . '/auth.php';
