<?php
use think\Route;

Route::rule('/','Index/index');
Route::rule('test','Test/test','get');