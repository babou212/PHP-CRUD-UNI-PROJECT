<?php

use App\Http\Controllers\comment\CommentController;
use App\Http\Controllers\post\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/search/', [PostController::class, 'search'])->name('posts.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('posts', PostController::class);

    Route::get('/posts/comment/{post}', [PostController::class, 'comment'])->name('posts.comment');
    Route::post('/posts/add-comment/', [CommentController::class, 'store'])->name('comments.store');

    Route::delete('/delete-comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
});

require __DIR__.'/auth.php';
