<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\DaysController;
use App\Http\Controllers\EnrollsController;
use App\Http\Controllers\GendersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StagesController;
use App\Http\Controllers\StatusesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TypesController;



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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {

    Route::get("/dashboards",[DashboardsController::class,'index'])->name("dashboard.index");

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource("attendances",AttendancesController::class);
    Route::resource("categories",CategoriesController::class);
    Route::resource("cities",CitiesController::class);
    Route::resource("comments",CommentsController::class);
    Route::resource("countries",CountriesController::class);
    Route::resource("days",DaysController::class);
    Route::resource("enrolls",EnrollsController::class);
    Route::resource("genders",GendersController::class);
    Route::resource("posts",PostsController::class);
    Route::resource("roles",RolesController::class);
    Route::resource("stages",StagesController::class);
    Route::resource("statuses",StatusesController::class);
    Route::resource("students",StudentsController::class);
    Route::resource("tags",TagsController::class);
    Route::resource("types",TypesController::class);
});

require __DIR__.'/auth.php';
