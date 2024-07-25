<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use App\Models\Category;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    if (Auth::user()->isAdmin == true) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('welcome');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['isAdmin', 'auth'])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['isAdmin', 'auth'])->group(function () {
    Route::resource('admin/book', BookController::class);
    Route::resource('admin/history', HistoryController::class);
    Route::resource('admin/user', UserController::class);
});
Route::middleware(['auth', 'isHaveProfile'])->group(function () {
    Route::get('welcome', function () {
        $book = Book::all();
        $category = Category::all();
        return view('master.book.user.index', compact('book', 'category'));
    })->name('welcome');
    Route::get('book/{book}', [BookController::class, 'userShow'])->name('user.book.show');
    Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('pinjaman-saya', function () {
        $history = History::where('user_id', Auth::user()->id)->get();
        return view('pinjaman-saya', compact('history'));
    })->name('pinjaman-saya');
    Route::post('history/{book}/', [HistoryController::class, 'userStore'])->name('user.history.store');
});
Route::middleware('auth')->group(function () {
    Route::get('user/profile', [UserController::class, 'profileCreate'])->name('user.profile.create');
    Route::post('user/profile', [UserController::class, 'profileStore'])->name('user.profile.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
