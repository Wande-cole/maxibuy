<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\SubscriberController;
use App\Models\SubscriberServer;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// create new topic
Route::post('/topic', [TopicController::class, 'store']);

// create new message
Route::post('/publish/{topic}', [MessageController::class, 'store']);

// create new subscription
Route::post('/subscribe/{topic}', [SubscriberController::class, 'store']);

// sample subscribing server
Route::post('/subscriber/test', function(Request $request){
    SubscriberServer::create([
        'title' => $request->title,
        'body' => $request->body
    ]);

    return response('Success', 300)
    ->header('Content-Type', 'text/plain');
});