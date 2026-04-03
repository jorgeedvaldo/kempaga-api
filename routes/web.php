<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — Kempaga Public Website
|--------------------------------------------------------------------------
|
| Rotas do site público e área do agente.
|
*/

// ── Página Inicial ──
Route::get('/', function () {
    return view('site.home');
})->name('site.home');

// ── Páginas Públicas ──
Route::get('/sobre', function () {
    return view('site.about');
})->name('site.about');

Route::get('/faq', function () {
    return view('site.faq');
})->name('site.faq');

Route::get('/privacidade', function () {
    return view('site.privacy');
})->name('site.privacy');

Route::get('/termos', function () {
    return view('site.terms');
})->name('site.terms');

Route::get('/contacto', function () {
    return view('site.contact');
})->name('site.contact');

// ── Autenticação (Agentes) ──
Route::get('/entrar', function () {
    return view('site.login');
})->name('site.login');

Route::get('/registar', function () {
    return view('site.register');
})->name('site.register');

// ── Painel do Agente ──
Route::get('/painel', function () {
    return view('site.dashboard');
})->name('site.dashboard');
