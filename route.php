<?php
Route::get('/',[MainController::class,'index']);
Route::get('/test',function (){
    return ' My first callable function';
});

