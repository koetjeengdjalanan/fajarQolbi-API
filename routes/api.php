<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CategoryController;
use App\Models\BlogPost;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [BlogPostController::class, 'index']);
Route::get('posts', [BlogPostController::class, 'index']);
Route::get('posts/{id}', [BlogPostController::class, 'show']);

Route::get('categories', [CategoryController::class, 'index']);

Route::get('test', function (Request $request) {
    if ($request->has('tgl')) {
        return $request->date('tgl');
    }
    return null;
});
