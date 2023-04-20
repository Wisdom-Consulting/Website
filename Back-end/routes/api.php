<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\cloudinary;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizFieldController;
use App\Http\Controllers\UserQuizScoreController;
use App\Models\User;
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

// Load landing page
Route::get('/', function () {
    return view('welcome');
});
//Route::post('/comments', function ()
//{
//    return response()->json(['message' => 'Comment created successfully']);
//});
// Route for profile
Route::middleware(['auth:sanctum'])->get('/profile', function (Request $request) {
    return $request->user();
});

// assign role to user
Route::middleware(['auth:sanctum'])->post('/dashboard/assign-role', function(Request $request) {
    $user = App\Models\User::find($request->user);
    $role = $request->role;
    $user->syncRoles($role);

    return response()->json(['message' => 'Role assigned successfully ['. $role.']']);
});

// Route ressource for users
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {

    return [
        'user' => $request->user(),
        'role' => $request->user()->getRoleNames()
    ];
});
// Route for cloudinary signature
Route::middleware(['auth:sanctum'])->get('/signature', cloudinary::class.'@getSignature');
// Route resource for content
Route::middleware(['auth:sanctum'])->resource('content', ContentController::class);
Route::get('/myContent', [ContentController::class, 'indexByUser']);
// Route resource for categories
Route::middleware(['auth:sanctum'])->resource('categories', CategoryController::class);
// Route resource for quizzes
Route::middleware(['auth:sanctum'])->resource('quizzes', QuizController::class);
// Route resource for quiz_fields
Route::middleware(['auth:sanctum'])->resource('quiz_fields', QuizFieldController::class);
// Route resource for questions
Route::middleware(['auth:sanctum'])->resource('questions', QuestionController::class);
// Route resource for answers
Route::middleware(['auth:sanctum'])->resource('answers', AnswerController::class);
// Route resource for scores
Route::middleware(['auth:sanctum'])->resource('scores', UserQuizScoreController::class);
// Route resource for posts
Route::middleware(['auth:sanctum'])->resource('posts', PostController::class);
// Route for delete like from post
Route::middleware(['auth:sanctum'])->delete('/posts/{post}/likes', [PostController::class, 'deleteLike']);
// Route resource for comments
Route::resource('comments', CommentController::class);
// Route resource for likes
Route::middleware(['auth:sanctum'])->resource('likes', LikeController::class);
// Route resource for chat
Route::middleware(['auth:sanctum'])->resource('chats', ChatController::class);
// Route resource for messages
Route::middleware(['auth:sanctum'])->resource('messages', MessageController::class);
// Route resource for levels
Route::middleware(['auth:sanctum'])->resource('levels', LevelController::class);

