<?php

use App\Models\Project;
use App\Models\Certificate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardProjectController;
use App\Http\Controllers\DashboardCertificateController;

Route::get('/', function () {
    return view('home', [
        'title' => "Portofolio Laravel",
    ]);
});

Route::get('/home', function () {
    return view('home', [
        'title' => "Home",
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => "About",
    ]);
});

Route::get('/certificates', function () {
    $certificates = Certificate::all();
    return view('certificates', compact('certificates'))->with('title', 'Certificate');
});

Route::get('/projects', function () {
    $projects = Project::all();
    return view('project', compact('projects'))->with('title', 'Project');
});

Route::get('/service', function () {
    return view('service', [
        'title' => "Services",
    ]);
});

Route::get('/education', function () {
    return view('education', [
        'title' => "Education",
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'title' => "Contact",
    ]);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index', ['title' => 'Home']);
    });
    Route::resource('/dashboard/certificates', DashboardCertificateController::class);
    Route::resource('/dashboard/projects', DashboardProjectController::class);
});
