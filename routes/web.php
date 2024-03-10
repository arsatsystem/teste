<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

https://m.pg-nmga.com/
126/
index.html
?btt=1
&ot=181FF71B-20D7-4E3C-9E2B-F5602D055DA7
&ops=nashAAA9218563AAAwMMY427Kh4AhtIyxUxYLvdd85s4PHfsX
&l=pt
&f=https://m.realsbet.com/casino
&__refer=m.pgr-nmga.com
&or=static.pg-nmga.com
&__hv=1f819bc7
*/

Route::get('/{path}', [CopyController::class, 'copy'])->where('path', '.*');

