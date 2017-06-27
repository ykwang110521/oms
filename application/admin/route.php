<?php
use think\Route;

Route::rule('/','Index/index');
Route::group('pages',function(){
    //Route::rule('charts/chartjs','Pages/ChartJs',array('method'=>'get'));
});

//Route::rule('/','Index/index');
Route::rule('test','Test/test','get');