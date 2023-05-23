<?php


use App\Http\Controllers\FormationController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('/dashboard/manage-formation/')->controller(FormationController::class)->group(function(){

    Route::get('','dashboard')->name("formation_main_dashboard");

    Route::get('formations','index')->name("list_formations");

    Route::get('formation','create')->name('create_formation');

    Route::post('formation','store')->name("store_formation");

    Route::get('formation/{formation_id}','show')->name("show_formation");

    Route::get('formation/{formation_id}/publish','publish')->name("publish_formation");

    Route::post('formation/{formation_id}','update')->name('update_formation');

});

Route::middleware('auth')->prefix('/dashboard/track-formation')->controller(FormationController::class)->group(function(){

    Route::get('/','track_formation')->name("track_formation_dashboard");

    Route::get('/{formation_id}/participants','formation_participants')->name("formation_participants");

    Route::post('/{formation_id}/confirm-participation','confirm_participation')->name("confirm_participation");
//
//    Route::get('formations','index')->name("list_formations");
//
//    Route::get('formation','create')->name('create_formation');
//
//    Route::post('formation','store')->name("store_formation");
//
//    Route::get('formation/{formation_id}','show')->name("show_formation");
//
//    Route::post('formation/{formation_id}','update')->name('update_formation');

});
