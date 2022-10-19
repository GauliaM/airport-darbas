<?php

use App\Http\Controllers\AirlinesController;
use App\Http\Controllers\AirportsController;
use App\Http\Controllers\CountriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Views;

Route::get('/', [Views::class, "index"]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/airports', [Views::class, "airports"]);
Route::get('/airports/add', [Views::class, "add_airports"]);
Route::get('/airports/edit/{id}', [Views::class, "edit_airports"]);
Route::get('/airports/removeAirline/{id}', [Views::class, "remove_airlines"]);
Route::get('/airports/delete/{id}', [Views::class, "delete_airports"]);
Route::get('/airports/newAirline/{id}', [Views::class, "add_airlines"]);

Route::get('/countries', [Views::class, "countries"]);
Route::get('/countries/new', [Views::class, "add_countries"]);
Route::get('/countries/edit/{id}', [Views::class, "edit_countries"]);
Route::get('/countries/delete/{id}', [Views::class, "delete_countries"]);
Route::get('/countries/noAirlines', [Views::class, "noAirlines"]);
Route::get('/countries/noAirlinesCountries', [Views::class, "noAirlinesAirports"]);

Route::post('/countries/update/{id}', [CountriesController::class, "update"]);
Route::post('/countries/delete/{id}', [CountriesController::class, "delete"]);
Route::post('/add_countries',[CountriesController::class, "create"]);

Route::get('/airlines', [Views::class, "airlines"]);
Route::get('/airlines/new', [Views::class, "create_airlines"]);
Route::get('/airlines/edit/{id}', [Views::class, "edit_airlines"]);
Route::get('/airlines/delete/{id}', [Views::class, "delete_airlines"]);

Route::post('/airlines/add', [AirlinesController::class, "create"]);
Route::post('airlines/update/{id}', [AirlinesController::class, "update"]);
Route::post('/airlines/delete/{id}', [AirlinesController::class, "delete"]);

Route::post('/airports/add', [AirportsController::class, "create"]);
Route::post('/airports/update/{id}', [AirportsController::class, "update"]);
Route::post('/airports/delete/{id}', [AirportsController::class, "delete"]);
Route::post('/airports/airline/{id}', [AirportsController::class, "airline"]);
Route::post('/airports/airlineremove/{id}', [AirportsController::class, "airliner"]);
Route::post('/airports/search/', [AirportsController::class, "search"]);

