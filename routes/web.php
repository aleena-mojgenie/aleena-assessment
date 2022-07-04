<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;

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

Route::get('dashboard','DashBoardController@home')->middleware('auth');
Route::get('deposit','DepositController@home')->middleware('auth');
Route::get('withdraw','WithdrawController@home')->middleware('auth');
Route::get('transfer','TransferController@home')->middleware('auth');
Route::get('statement','StatementController@index')->middleware('auth');

Route::get('insert','DepositController@insertForm')->middleware('auth');
Route::post('create','DepositController@insert')->middleware('auth');

Route::get('dd','TransferController@abc')->middleware('auth');

Route::get('insert-withdrawform','WithdrawController@insertForm')->middleware('auth');
Route::post('create-withdrawform','WithdrawController@insert')->middleware('auth');

Route::get('insert-transferform','TransferController@insertForm')->middleware('auth');
Route::post('create-transferform','TransferController@insert')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
