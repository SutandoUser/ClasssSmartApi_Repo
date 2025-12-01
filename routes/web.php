<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\GroupController;



Route::get('/', function () {
    return redirect()->route('login');
});
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
    //Registrar 
    Route::get('/register', function(){return view("auth.register");})->name("register");
    Route::post('/register', [WebAuthController::class,'webRegister']);

    //Home
    Route::get('/admin/home', function(){ return view('admin.home'); })->name('admin.home');

    //Desactivar
    Route::get('/deactivate', [WebAuthController::class, 'showDeactivateForm'])->name('deactivate.form');
    Route::post('/deactivate', [WebAuthController::class, 'webDeactivate'])->name('deactivate.user');
    //Reactivar
    Route::get('/reactivate', [WebAuthController::class, 'showReactivateForm'])->name('reactivate.form');
    Route::post('/reactivate', [WebAuthController::class, 'webReactivate'])->name('reactivate.user');

    //Cargar Usuarios por Rol
    Route::get('/users/by-role/{roleId}', [WebAuthController::class, 'getUsersByRole']);
    //Cargar Usuarios Inactivos por Rol
    Route::get('/inactive-users/by-role/{roleId}', [WebAuthController::class, 'getInactiveUsersByRole']);
});


// PURO TEACHER
Route::middleware(['auth','role:2'])->group(function(){
    Route::get('/teacher/home', function(){ return view('teacher.home'); })->name('teacher.home');
    Route::get("/teacher/homeworktab", function(){return view("teacher.homeworktab");})->name("teacher.homework");
    Route::get('/teacher/forum', function(){ return view('teacher.forum'); })->name('teacher.forum');

    //Route::get("/teacher/groups", function(){return view("teacher.groups");})->name("teacher.groups");
    Route::get("/teacher/groups", [GroupController::class, 'index'])->name("teacher.groups");
    Route::get("/teacher/groups/{groupId}", [GroupController::class, 'show'])->name("teacher.groups.show");
    
    
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
})->name("forceLogout");

