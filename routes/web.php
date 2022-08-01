<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*s
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', 'CompanyController@index');

//authentication routes
Auth::routes();
Route::resource('/', CompanyController::class)->middleware(['auth']);

Route::resource('/companies', CompanyController::class)->middleware(['auth']);
//companies routes
//Route::get('/', 'CompanyController@index');
