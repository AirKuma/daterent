<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('index');
});*/
//home
Route::get('/',['as' => 'index', 'uses' => 'HomeController@index']);
Route::get('/home',['as' => 'index', 'uses' => 'HomeController@index']);
Route::get('contactus',['as' => 'contactus', 'uses' => 'HomeController@contactus']);
Route::post('contactus/send',['as'=>'contactus.send','uses'=>'HomeController@send_mail']);
Route::post('contactus/title',['as'=>'contactus.title','uses'=>'HomeController@title']);

//auth
Route::get('auth/login', ['as' => 'user.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/register',['as' => 'user.register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register',['as' => 'user.register', 'uses' => 'Auth\AuthController@postRegister']);
Route::get('auth/logout', ['as' => 'user.logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::get('activate', ['as' => 'user.activate', 'uses' => 'Auth\AuthController@getActivateAccount']);
Route::get('activate/{code}', ['as' => 'user.activate.code', 'uses' => 'Auth\AuthController@activateAccount']);
Route::post('activate/send/{id}', ['as' => 'activate.send', 'uses' => 'Auth\AuthController@send_mail']);

//user
Route::get('user/show/{id}', ['as' => 'user.show', 'uses' => 'UserController@show']);
Route::get('user/follow/{id}/{step}', ['as' => 'user.follow', 'uses' => 'FollowController@index']);
Route::get('user/message/{id}/{step}', ['as' => 'user.message', 'uses' => 'MessageController@index']);
Route::get('user/comment/{id}/{step}', ['as' => 'user.comment', 'uses' => 'CommentController@index']);
Route::get('user/request/{id}', ['as' => 'user.request', 'uses' => 'RequestController@userindex']);
Route::get('user/editaccount/{id}', ['as' => 'user.editaccount', 'uses' => 'UserController@editaccount']);
Route::get('user/editprofile/{id}', ['as' => 'user.editprofile', 'uses' => 'UserController@editprofile']);
Route::get('user/editrent/{id}', ['as' => 'user.editrent', 'uses' => 'RentController@edit']);
//picture
Route::get('user/picture/{id}', ['as' => 'user.picture', 'uses' => 'PictureController@index']);
Route::get('picture/create/{id}', ['as' => 'picture.create', 'uses' => 'PictureController@create']);
Route::post('picture/store/{id}', ['as' => 'picture.store', 'uses' => 'PictureController@store']);
Route::get('picture/edit/{id}/{pid}', ['as' => 'picture.edit', 'uses' => 'PictureController@edit']);
Route::patch('picture/update/{id}/{uid}', ['as' => 'picture.update', 'uses' => 'PictureController@update']);
Route::get('picture/destroy/{id}', ['as' => 'picture.destroy', 'uses' => 'PictureController@destroy']);
Route::get('all/picture/{id}', ['as' => 'all.picture', 'uses' => 'PictureController@allpicture']);
//video
Route::get('user/video/{id}', ['as' => 'user.video', 'uses' => 'VideoController@index']);
Route::get('video/create/{id}', ['as' => 'video.create', 'uses' => 'VideoController@create']);
Route::post('video/store/{id}', ['as' => 'video.store', 'uses' => 'VideoController@store']);
Route::get('video/edit/{id}/{vid}', ['as' => 'video.edit', 'uses' => 'VideoController@edit']);
Route::patch('video/update/{id}/{uid}', ['as' => 'video.update', 'uses' => 'VideoController@update']);
Route::get('video/destroy/{id}', ['as' => 'video.destroy', 'uses' => 'VideoController@destroy']);
Route::get('all/video/{id}', ['as' => 'all.video', 'uses' => 'VideoController@allvideo']);
//user-update
Route::patch('user/updateaccount/{id}', [ 'as' => 'user.updateaccount', 'uses' => 'UserController@updateaccount']);
Route::patch('user/updateprofile/{id}', [ 'as' => 'user.updateprofile', 'uses' => 'UserController@updateprofile']);

//rent
//Route::get('rent/{sort}/{gen}/{reg}', ['as' => 'rent.index', 'uses' => 'RentController@index']);
Route::get('rent/index/{sort}', ['as' => 'rent.index', 'uses' => 'RentController@index']);
//Route::get('rent/search/{sort}', ['as' => 'rent.search', 'uses' => 'RentController@search']);
Route::get('rent/create/{uid}', ['as' => 'rent.create', 'uses' => 'RentController@create']);
Route::get('rent/{id}', ['as' => 'rent.show', 'uses' => 'RentController@show']);
Route::post('rent/store/{uid}', ['as' => 'rent.store', 'uses' => 'RentController@store']);
Route::patch('rent/update/{id}', ['as' => 'rent.update', 'uses' => 'RentController@update']);
Route::get('rent/set/{id}', ['as' => 'rent.set', 'uses' => 'RentController@set']);

//request
/*Route::get('request/{gen}/{reg}', ['as' => 'request.index', 'uses' => 'RequestController@index']);
Route::get('request/search', ['as' => 'request.search', 'uses' => 'RequestController@search']);
Route::get('request/create', ['as' => 'request.create', 'uses' => 'RequestController@create']);
Route::post('request/store', ['as' => 'request.store', 'uses' => 'RequestController@store']);
Route::get('request/{id}', ['as' => 'request.show', 'uses' => 'RequestController@show']);
Route::get('request/edit/{id}/{rid}', ['as' => 'request.edit', 'uses' => 'RequestController@edit']);
Route::patch('request/update/{id}/{uid}', ['as' => 'request.update', 'uses' => 'RequestController@update']);
Route::get('request/destroy/{id}/{uid}', ['as' => 'request.destroy', 'uses' => 'RequestController@destroy']);*/

//message
Route::get('message/create/{id}', ['as' => 'create.message', 'uses' => 'MessageController@create']);
Route::post('message/store/{id}', ['as' => 'message.store', 'uses' => 'MessageController@store']);
Route::get('message/destroy/{id}', ['as' => 'destroy.message', 'uses' => 'MessageController@destroy']);

//report
Route::get('report/create/{id}', ['as' => 'report.create', 'uses' => 'ReportController@create']);
Route::post('report/store/{id}', ['as' => 'report.store', 'uses' => 'ReportController@store']);

//follow
Route::get('follow/store/{id}', ['as' => 'follow.store', 'uses' => 'FollowController@store']);
Route::get('follow/destroy/{id}', ['as' => 'follow.destroy' , 'uses' => 'FollowController@destroy']);

//rentuser
Route::get('rentuser/store/{id}', ['as' => 'rentuser.store', 'uses' => 'RentuserController@store']);

//comment
Route::get('comment/create/{id}', ['as' => 'comment.create', 'uses' => 'CommentController@create']);
Route::post('comment/store/{id}', ['as' => 'comment.store', 'uses' => 'CommentController@store']);

//like
//Route::get('like/store/{id}', ['as' => 'like.store', 'uses' => 'LikeController@store']);
//Route::get('like/destroy/{id}', ['as' => 'like.destroy' , 'uses' => 'LikeController@destroy']);

//admin_user
Route::get('admin/user', ['as' => 'admin.user', 'uses' => 'Admin\AdminUserController@index']);
Route::patch('admin/user/permissions/{id}', ['as' => 'admin.user.permissions', 'uses' => 'Admin\AdminUserController@permissions_update']);
Route::patch('admin/user/block/{id}', ['as' => 'admin.user.block', 'uses' => 'Admin\AdminUserController@block']);

//admin_rent
Route::get('admin/rent', ['as' => 'admin.rent', 'uses' => 'Admin\AdminRentController@index']);
Route::patch('admin/rent/ifrent/{id}', ['as' => 'admin.rent.ifrent', 'uses' => 'Admin\AdminRentController@ifrent_update']);
Route::patch('admin/rent/block/{id}', ['as' => 'admin.rent.block', 'uses' => 'Admin\AdminRentController@block']);

//admin_request
Route::get('admin/request', ['as' => 'admin.request', 'uses' => 'Admin\AdminRequestController@index']);
Route::get('admin/request/destroy/{id}', ['as' => 'admin.request.destroy', 'uses' => 'Admin\AdminRequestController@destroy']);

//admin_report
Route::get('admin/report', ['as' => 'admin.report', 'uses' => 'Admin\AdminReportController@index']);
Route::get('admin/report/destroy/{id}', ['as' => 'admin.report.destroy', 'uses' => 'Admin\AdminReportController@destroy']);

//admin_ad
Route::get('admin/advertisement', ['as' => 'admin.advertisement', 'uses' => 'Admin\AdminAdController@index']);
Route::get('admin/advertisement/create', ['as' => 'admin.advertisement.create', 'uses' => 'Admin\AdminAdController@create']);
Route::post('admin/advertisement', ['as' => 'admin.advertisement.store', 'uses' => 'Admin\AdminAdController@store']);
Route::get('admin/advertisement/edit/{id}', ['as' => 'admin.advertisement.edit', 'uses' => 'Admin\AdminAdController@edit']);
Route::patch('admin/advertisement/update/{id}', ['as' => 'admin.advertisement.update', 'uses' => 'Admin\AdminAdController@update']);
Route::get('admin/advertisement/destroy/{id}', ['as' => 'admin.advertisement.destroy', 'uses' => 'Admin\AdminAdController@destroy']);