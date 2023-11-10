<?php

use Illuminate\Support\Facades\Route;
use App\Models\Page;
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

Route::get('/', function () {
    dd(Page::find('first-page'));
    return view('pages');
});
//{page} is called wildcard constraint
//how to send data to templates
Route::get('/pages/{page}', function ($slug) {
    // dd($slug); // dd function is useful in debugging
    $page = Page::find($slug);
    return view('page', [
        'page'=>$page
    ]);
})->where('page', '[A-z\d\-_]+');//first-page, =>first_page
//api test
// Route::get('/apitest', function () {
//     return ["key"=>"bobothawapi"];
// });