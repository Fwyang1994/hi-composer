<?php

Route::get('/hi-composer', 'Hero\HelloComposer\Controllers\IndexController@index')->middleware("hi-composer.hi");
