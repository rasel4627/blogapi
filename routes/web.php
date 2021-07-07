<?php

// route for user.......
$router->get('/AllUser',['middleware'=>'auth','uses' => 'UserController@AllUser']);
$router->post('/UserReg',['middleware'=>'auth','uses' => 'UserController@UserRegistration']);
$router->get('/SingleUser/{id}',['middleware'=>'auth','uses' => 'UserController@SingleUser']);
$router->post('/UserLogin',['middleware'=>'auth','uses' => 'UserController@UserLogin']);

// route for Post.......
$router->get('/AllPost',['middleware'=>'auth','uses' => 'PostController@AllPost']);
$router->post('/StorePost',['middleware'=>'auth','uses' => 'PostController@StorePost']);
$router->get('/PostDetails/{id}',['middleware'=>'auth','uses' => 'PostController@PostDetails']);

// route for My Post.......
$router->get('/MyPost/{userid}',['middleware'=>'auth','uses' => 'PostController@MyPost']);
$router->get('/DeletePost/{id}',['middleware'=>'auth','uses' => 'PostController@DeletePost']);
$router->get('/EditPost/{id}',['middleware'=>'auth','uses' => 'PostController@EditPost']);
$router->post('/UpdatePost/{id}',['middleware'=>'auth','uses' => 'PostController@UpdatePost']);

// Comment....
$router->post('/StoreComment',['middleware'=>'auth','uses' => 'PostController@StoreComment']);
$router->get('/GetComment/{id}',['middleware'=>'auth','uses' => 'PostController@GetComment']);
  

