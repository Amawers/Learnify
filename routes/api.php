<?php

use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Models\User;


// PUBLIC ROUTES
Route::post('/signup', [UserController::class, 'signup']);
Route::post('/login', [UserController::class, 'login']);

// PRIVATE ROUTES
Route::group(['middleware' => ['auth:sanctum']], function () {

    // Dashboard Data
    Route::get('/dashboard', function () {
        $data = User::find(Auth::id())->select('id')->first();
        $courseDataArr = array();
        foreach($data->courses as $course){
            $courseId = $course->id;
            $imagePath = $course->image_path;
            $instructorName = $course->instructor_name;
            $title = $course->title;
            $progress = $course->progress;

            array_push($courseDataArr, ['course_id' => $courseId, 'instructor_name' => $instructorName, 'image_path' => $imagePath, 'title' => $title, 'progress' => $progress]);
        }

        $response = [
            'message' => 'Successfully Retrieve Dashboard Data.',
            'data' => $courseDataArr,
            'success' => true
        ];
        return response($response, 200);
    });

    // Specific Course Data
    Route::get('/course/{course_id}', function($course_id){
        $course = Course::find($course_id);
        $courseDetail = Course::find($course_id)->course_detail;
        $courseObjective = Course::find($course_id)->course_objective;
        $objectivesArr = array();
        foreach($courseObjective as $objective){
            array_push($objectivesArr ,$objective->objective);
        }

        $courseTopic = Course::find($course_id)->course_topic;
        $topicsArr = array();
        foreach($courseTopic as $topic){
            array_push($topicsArr ,$topic->topic);
        }

        $learningMaterial = Course::find($course_id)->learning_material;
        $materialsArr = array();
        foreach($learningMaterial as $material){
            array_push($materialsArr, $material->lesson_name);
        }

        $response = [
            'message' => 'Successfully Retrieve Specific Course Data.',
            'data' => ['instructor_name' => $course->instructor_name,  'title' => $course->title, 'description' => $courseDetail->first()->description, 'objectives' => $objectivesArr, 'topics' => $topicsArr, 'materials' => $materialsArr],
            'success' => true
        ];

        return response($response, 200);
    });


    // Logout Authenticated User
    Route::delete('/logout', [UserController::class, 'logout']);
});


/*
 *
 * FOR TESTING PURPOSE!!!!!!!!!!!!!!!!!!!!!
 *
 */

 // SAMPLE SELECT QUERY ONE TO MAY
Route::get('/one-to-many', function () {
    $courseDetails = Course::find(1)->course_detail;
    return response()->json([$courseDetails]);
});

// SAMPLE DATA INSERTION TO A MANY TO MANY RELATIONSHIP
Route::post('/many-to-many', function (Request $request, User $user) {
    $userId = User::find(3);
    $userId->courses()->attach($request->test);
    return 'attached';
});

// SAMPLE RETRIEVE PIVOT TABLE
Route::get('/retrieve-pivot', function (Request $request, User $user) {
    $userId = User::find(3);
    $data = array();
    foreach($userId->courses as $course){
        $data = $course->image_path;
    }
    echo $data;
});
