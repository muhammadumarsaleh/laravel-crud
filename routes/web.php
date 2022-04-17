 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [SiteController::class, 'home']);
Route::get('/about', [SiteController::class, 'about']);
Route::get('/register', [SiteController::class, 'register']);
Route::post('/postregister', [SiteController::class, 'postregister']);


// Route::get('/', [AuthController::class, 'login']);

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth', 'CheckRole:admin']], function(){
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::post('/siswa/create', [SiswaController::class, 'create']);
    Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit']);
    Route::get('/siswa/{siswa}/delete', [SiswaController::class, 'delete']);
    Route::post('/siswa/{siswa}/update', [SiswaController::class, 'update']);
    Route::get('/siswa/{siswa}/profile', [SiswaController::class, 'profile']);
    Route::post('/siswa/{siswa}/addnilai', [SiswaController::class, 'addnilai']);
    Route::get('/guru/{guru}/profile', [GuruController::class, 'profile']);
    Route::get('/siswa/{siswa}/{mapel}/deletenilai', [SiswaController::class, 'deletenilai']); 
    Route::get('/posts/add', [PostController::class, 'addposts']);
    Route::post('/posts/create', [PostController::class, 'create']);
});

Route::group(['middleware' => ['auth', 'CheckRole:admin,siswa']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/posts/{post:slug}', [PostController::class, 'singlepost']);
});

