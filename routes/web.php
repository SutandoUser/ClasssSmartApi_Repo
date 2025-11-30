<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController;

//INICIO DE SESION
Route::middleware('guest')->group(function(){
    Route::get('/login', [WebAuthController::class,'showLogin'])->name('login');
    Route::post('/login', [WebAuthController::class,'login']);
});

//PARA LOS QUE YA ESTAN LOGGEADOS
Route::middleware('auth')->group(function(){
    Route::post('/logout', [WebAuthController::class,'logout'])->name('logout');
    Route::get('/profile', [WebAuthController::class,'profile'])->name('profile');
});

//COSAS PARA PURO ADMIN
Route::middleware(['auth','role:1'])->group(function(){
    Route::get('/register', function(){return view("auth.register");})->name("register");
    Route::post('/register', [WebAuthController::class,'webRegister']);
    Route::get('/admin/home', function(){ return view('admin.home'); })->name('admin.home');
});


// PURO TEACHER
Route::middleware(['auth','role:2'])->group(function(){
    Route::get('/teacher/home', function(){ return view('teacher.home'); })->name('teacher.home');
    Route::get("/teacher/homeworktab", function(){return view("teacher.homeworktab");})->name("teacher.homework");
    Route::get('/teacher/forum', function(){ return view('teacher.forum'); })->name('teacher.forum');
    Route::get("/teacher/groups", function(){return view("teacher.groups");})->name("teacher.groups");
    Route::get('/teacher/messages', function(){ return view('teacher.messages'); })->name('teacher.messages');
    Route::get("/teacher/notifications", function(){return view("teacher.notifications");})->name("teacher.notifications");
});

// PURO STUDENT
Route::middleware(['auth','role:3'])->group(function(){
    Route::get('/student/home', function(){ return view('student.home'); })->name('student.home');
});

// PURO PARENT
Route::middleware(['auth','role:4'])->group(function(){
    Route::get('/parent/home', function(){ return view('parent.home'); })->name('parent.home');
});

Route::get('/force-logout', function(){
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
});

