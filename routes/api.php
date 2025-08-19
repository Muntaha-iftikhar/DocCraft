<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccountController;


Route::post('/login', [UserAuthController::class, 'login']);
Route::post('/signup', [UserAuthController::class, 'signup']);

//create a user's post 
Route::post('/posts', [PostController::class, 'createPost']);

//get his own posts to show on profile
Route::get('/user/posts/{userId}', [PostController::class, 'getUserPosts']);

//get users posts to show on profile
Route::get('/users/posts/{userId}', [PostController::class, 'getUsersPosts']);

//to show all users posts on time
Route::get('/posts-with-user-names', [PostController::class, 'getPostsWithUserNames']);

//get users profile data using his user_id
Route::get('user/data/{userId}', [PostController::class, 'getUserData']);

//check if i follow this account or not
Route::post('/is-following', [PostController::class, 'isFollowing']);

//if follow then make it following and vice virsa
Route::post('/toggle-follow', [PostController::class, 'toggleFollow']);

//updating or inserting bio 
Route::post('/update-bio', [AccountController::class, 'updateBio']);


Route::post('/save-facebook-link', [AccountController::class, 'saveFacebookLink']);

Route::post('/save-instagram-link', [AccountController::class, 'saveInstagramLink']);

Route::post('/save-linkedin-link', [AccountController::class, 'saveLinkedInLink']);

Route::post('/save-youtube-link', [AccountController::class, 'saveYouTubeLink']);

Route::post('/save-account-status', [AccountController::class, 'saveAccountStatus']);

Route::post('/save-location', [AccountController::class, 'saveLocation']);


Route::get('/get-account-details/{user_id}', [AccountController::class, 'getAccountDetails']);
