<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\cloudinary;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//public function handle($request, Closure $next, ...$permissions)
//{
//    $user = $request->user();
//
//    if (!$user) {
//        return response()->json(['error' => 'Unauthenticated.'], 401);
//    }
//
//    foreach ($permissions as $permission) {
//        if (!$user->can($permission)) {
//            return response()->json(['error' => 'Unauthorized.'], 403);
//        }
//    }
//
//    return $next($request);
//}

// Load landing page
Route::get('/', function () {
    return view('welcome');
});

// Route for profile
Route::middleware(['auth:sanctum'])->get('/profile', function (Request $request) {
    return $request->user();
});


// Route ressource for users
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
// Route for cloudinary signature
Route::middleware(['auth:sanctum'])->get('/signature', cloudinary::class.'@getSignature');
// Route resource for content
//Route::middleware(['auth:sanctum'])->resource('content', ContentController::class);
// Route resource for categories
// get content
Route::middleware(['auth:sanctum'])->get('/content', [ContentController::class, 'index']);

Route::middleware(['auth:sanctum'])->resource('categories', CategoryController::class);
// Route resource for quizzes
Route::middleware(['auth:sanctum'])->resource('quizzes', QuizController::class);
// Route resource for questions
Route::middleware(['auth:sanctum'])->resource('questions', QuestionController::class);
// Route resource for answers
Route::middleware(['auth:sanctum'])->resource('answers', AnswerController::class);


