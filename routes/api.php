<?php
/*
 * @author <mdadalkhan@gmail.com> 
 */


use Illuminate\Support\Facades\Route;

Route::get("/api", function () {
  return response()->json(['message' => 'API Authenticated']);
});
