<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/allpost',[PostController::class, 'index'])->name(name:'posts.index');
Route::get("/allpost" ,[PostController::class ,"index"])->name(name:"posts.index")->middleware(['auth']);
Route::group(['middleware'=>['auth']],function () {
Route::get('/archive',[PostController::class,'archive'])->name(name:'posts.archive');
 Route::get('/allpost/create',[PostController::class,'create'])->name(name:'posts.create');

Route::put('/allpost/{post}',[PostController::class,'update'] )->name(name:'posts.update');
Route::get("/allpost/restore/{post}" , [PostController::class, "restore"])->name("posts.restore")->withTrashed();
Route::get("/allpost/edit/{post}", [PostController::class, "edit"])->name("posts.edit");

Route::get('/allpost/{post}',[PostController::class,'show'])->name(name:'posts.show');

});



 Route::delete('/allpost/{post}/',[PostController::class,'destroy'])->name(name:'posts.destory')->withTrashed();
;
Route::post('/allpost', [PostController::class,'store'])->name(name:'posts.store');
Route::post('/', function () {
    App\Models\Post::create(['title' => request('title')]);
    return redirect()->back();
});
// Route::resource('allpost', postController::class);
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
Auth::routes();

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
$user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);

    Auth::login($user);

    return redirect('/dashboard');
    $user = Socialite::driver('github')->user();

    // $user->token
});


