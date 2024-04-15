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

    /**
     * Resource for authenticated users only
     */
    Route::get('/testing', function () {
        return 'TEST!!!';
    });

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
