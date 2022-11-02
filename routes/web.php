<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Mailer;
use App\View\Components\workspace\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

use Illuminate\Foundation\Auth\EmailVerificationRequest;


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
    return view('index');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/send' , function(Request $request){
    //check if there is an authenticated user
    if (!Gate::allows('send-email')) {
        abort(500);
    }


    Mailer::send($request->input("email") , "hello from laravel" , "hello karim");
    return Redirect::back();
})->name('sendEmail');

/**
 * this part is for authenticated users (who logged in) that what i mean by middleware(auth)
 * also all the requests will redirecting automatically for App/Http/Controllers/Controller ( controler(Controller) )
 */
Route::middleware(['auth' /*, 'verified'*/])->controller(Controller::class)->group(function(){
    //route to emailer page
    Route::get('/emailer' , 'emailer');

    //route to workspace page
    Route::get('/workspace' , "workspace" )->name('workspace');

    //get file content to render

    Route::get('/getFileContent' , 'renderContent');
});

Route::controller(FileController::class)->group(function(){
    Route::post('/upload' , 'store')->name('newFile');
});

Route::controller(Controller::class)->group(function(){
    Route::get('getTool' , 'renderTool')->name('getTool');
});



/*Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

*/