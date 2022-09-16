<?php

use Illuminate\Support\Facades\Route;

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

Route::get('yajara/listing','\App\Http\Controllers\Doctorscontroller@listing')->name('doctors.listing');

Route::get('yajara/listingyajara','\App\Http\Controllers\Doctorscontroller@yajaralisting')->name('doctors.yajara-listing');

Route::get('yajara/add','\App\Http\Controllers\Doctorscontroller@create')->name('doctors.add');

Route::post('yajara/save-add','\App\Http\Controllers\Doctorscontroller@savecreate')->name('doctors.save-add');

Route::get('yajara/{id}/edit','\App\Http\Controllers\Doctorscontroller@edit')->name('doctors.edit');

Route::post('yajara/{id}/save-edit','\App\Http\Controllers\Doctorscontroller@update')->name('doctors.save-edit');

Route::get('yajara/{id}/delete','\App\Http\Controllers\Doctorscontroller@delete')->name('doctors.delete');
