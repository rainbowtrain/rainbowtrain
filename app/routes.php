<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/letters', function()
{
	return View::make('letters');
});

Route::get('/numbers', function()
{
	return View::make('numbers');
});

Route::get('/colors', function()
{
	return View::make('colors');
});

Route::get('/shapes', function()
{
	return View::make('shapes');
});

Route::get('/songs', function()
{
	return View::make('songs');
});

Route::get('/stories', function()
{
	return View::make('stories');
});

Route::get('/games', function()
{
	return View::make('games');
});

Route::get('/phonics', function()
{
	return View::make('index');
});

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/letters/{letter}', function($letter)   
{

	return View::make('letters/letter', array('letter' => $letter));
})->where('letter', '[A-Za-z]+');

Route::get('/numbers/{number}', function($number)   
{

	return View::make('numbers/number', array('number' => $number));
})->where('letter', '[0-9]+');