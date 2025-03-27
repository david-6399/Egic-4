<?php

use App\Http\Controllers\eventController;
use App\Http\Controllers\formationContoller;
use App\Livewire\Admin\Comment;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Debouche;
use App\Livewire\Admin\Formation as AdminFormation;
use App\Livewire\Admin\Formations\Formation as FormationsFormation;
use App\Livewire\Admin\notification;
use App\Livewire\Admin\Program as AdminProgram;
use App\Livewire\Admin\Student;
use App\Livewire\User\About;
use App\Livewire\User\Contact;
use App\Livewire\User\Event;
use App\Livewire\User\Formation;
use App\Livewire\User\Home;
use App\Livewire\User\MyCart;
use App\Models\program;
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

// Route::view('/', 'User.home');
// Route::view('/about', 'User.home');


route::get('/', Home::class);
route::get('/about', About::class);
route::get('/contact', Contact::class);
route::get('/mycart', MyCart::class)->middleware('auth');
route::get('/formation', Formation::class);
route::get('/evenement', Event::class);


Route::get('/formation/{id}', [formationContoller::class, 'show'])->name('formation.show');

route::get('/event/{id}', [eventController::class , 'show'])->name('event.show');

// route::prefix('admin')->groupe(function(){
//     route::get('/formation', Formation::class);
// });

route::group(['prefix'=>'admin','middleware'=>['can:admin','auth']], function (){
    route::get('/dashboard', Dashboard::class)->name('dashboard');
    route::get('/formation', AdminFormation::class)->name('formation');
    route::get('/program', AdminProgram::class)->name('program');
    route::get('/debouche', Debouche::class)->name('debouche');
    route::get('/commentaire', Comment::class)->name('comment');
    route::get('/notifications', notification::class)->name('notification');
    route::get('/student', Student::class)->name('student');
});

route::get('test', function(){
    return phpinfo();
});


Route::get('/test-gate', function() {
    $user = App\Models\User::first();
    auth()->login($user);
    
    \Log::debug('Gate check results', [
        'admin' => Gate::allows('admin'),
        'abilities' => Gate::abilities()
    ]);
    
    return response()->json([
        'gates_working' => Gate::allows('admin'),
        'user_role' => $user->role
    ]);
});


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
