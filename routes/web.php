<?php

use App\Http\Controllers\excelController;
use App\Http\Controllers\KeyTableController;
use App\Http\Controllers\text;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TextController;
use App\Http\Controllers\PhoneController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CaobaiController;
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
Route::view('/laravel','welcome');
Route::redirect('/','key/text');
Route::controller(text::class)->group(function () {
    Route::get('transfer/text', 'index')->name('transfer.text');
});
Route::controller(KeyTableController::class)->group(function () {
    Route::get('key/text','data')->name('key.text');
    Route::post('create/key','create')->name('key.create');
    Route::get('delete/key/{id?}','delete')->name('key.delete');
    Route::get('update/key/{id?}','edit')->name('key.edit');
    Route::post('update/key/{id?}', 'update')->name('key.update');
});
Route::controller(excelController::class)->group(function () {
    Route::get('excel/import/', 'excel')->name('key.excel');
    Route::post('excel/spinword', 'excelUpload')->name('upload.excel');
    Route::post('inspect/excel', 'render')->name('render');
    Route::post('excel/key', 'excelUploadkey')->name('upload.excel.key');
    Route::post('key/render', 'key_render')->name('key.render');
    Route::post('blacklist/render', 'blacklist_render')->name('blacklist.render');
    Route::post('excel/blacklist', 'excelUploadBlackList')->name('upload.excel.blacklist');
});
Route::view('create/key','levelphp.create')->name('key.create.view');
Route::controller(TextController::class)->group(function () {
    Route::get('paragraph', 'paragraph')->name('paragraph');
    Route::get('paragraph/v2/{name?}', 'paragraph_v2')->name('paragraph.v2');
    Route::get('edit/paragraph', 'edit_paragraph')->name('edit.paragraph');
    Route::get('edit/paragraph/v2/{id?}', 'edit_paragraph_v2')->name('edit.paragraph.v2');
    Route::post('update/paragraph', 'update_paragraph')->name('update.paragraph');
    Route::get('add/paragraph', 'add_paragraph')->name('add.paragraph');
    Route::post('update/paragraph/v2', 'update_paragraph_v2')->name('update.paragraph.v2');
    Route::post('update/paragraph/v3/{id?}', 'update_paragraph_v3')->name('update.paragraph.v3');
    Route::post('render/paragraph', 'render')->name('render.paragraph');
    Route::get('list/paragraph', 'list')->name('list');
    Route::get('delete/{id}', 'delete_paragraph')->name('delete.paragraph');
});
Route::controller(CaobaiController::class)->group(function () {
    Route::get('/campaign', 'list')->name('caobai.list');
    Route::get('/searchlist', 'search')->name('caobai.searchlist');
    Route::get('/blacklist', 'blacklist')->name('blacklist');
    Route::get('/caobai', 'implements')->name('implements');
    Route::get('/implements', 'googleapi')->name('url.inspect');
    Route::get('/search/key', 'inputkey')->name('key.create.view');
    Route::post('/search/key', 'storekey')->name('url.storekey');
    Route::get('/get/api', 'storecontent')->name('create');
    Route::get('/domain', 'inputdomain')->name('view.inputdomain');
    Route::post('/domain', 'storedomain')->name('create.domain');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('phone/number', [PhoneController::class, 'index'])->name('phone.number');
Route::get('phone/number/redirect', [PhoneController::class, 'redirect'])->name('phone.number.redirect');