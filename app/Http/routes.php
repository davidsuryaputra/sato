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

/* start contoh acl simple

Route::get('owner', ['middleware' => 'role:owner', function () {
  return 'cie owner masuk :p';
}]);

Route::get('manager', ['middleware' => 'role:manager', function () {
  return 'halo pak manager';
}]);

Route::get('denied/{role}', function ($role) {
  if($role){
    return 'hayo ngapain akses halaman '.$role.', emang kamu siapa? kan cuma client :p cie dah paham middleware nieh';
  }
  return 'boleh lah akses sini';
});

end contoh acl simple */


// Route::auth();

Route::get('/', 'Auth\AuthController@showLoginForm');
Route::post('/', 'Auth\AuthController@login');
///*
Route::get('/register', 'Auth\AuthController@showRegistrationForm');
Route::post('/register', 'Auth\AuthController@register');

Route::get('/password/reset/{token?}', 'Auth\AuthController@showResetForm');
Route::post('/password/reset', 'Auth\AuthController@reset');

Route::post('/password/email', 'Auth\AuthController@sendResetLinkEmail');

Route::get('/logout', 'Auth\AuthController@logout');
//*/

Route::get('/home', 'HomeController@index');

//route inti

Route::get('cek', function(){
  return dd(Auth::user()->showroom->name);
});

//owner
Route::group(['prefix' => 'owner', 'middleware' => ['auth', 'role:owner']], function () {

  //input showrooms baru >> assign manager (detail n salary)
  Route::get('showrooms', 'OwnerController@indexShowroom')->name('owner.showrooms');

  Route::get('showrooms/create', function () {
    return view('backend.owner.showrooms.create');
  });

  Route::post('showrooms/create', 'OwnerController@storeShowroom')->name('owner.showrooms.create');

  Route::get('showrooms/{id}/delete', 'OwnerController@destroyShowroom')->name('owner.showrooms.delete');

  Route::get('showrooms/{id}/edit', 'OwnerController@editShowroom')->name('owner.showrooms.edit');

  Route::patch('showrooms/{id}/update', 'OwnerController@updateShowroom');


  //input manager baru
    // /managers
  Route::get('managers', 'OwnerController@indexManager')->name('owner.managers.index');

  Route::get('managers/create', 'OwnerController@createManager')->name('owner.managers.create');

  Route::post('managers/create', 'OwnerController@storeManager')->name('owner.managers.store');

  Route::get('managers/{id}/delete', 'OwnerController@destroyManager')->name('owner.managers.destroy');

  Route::get('managers/{id}/edit', 'OwnerController@editManager')->name('owner.managers.edit');
  Route::patch('managers/{id}/update', 'OwnerController@updateManager')->name('owner.managers.update');

});


//manager
Route::group(['middleware' => ['auth', 'role:manager']], function () {

  //laporan keuangan, stock, aset

  //input accountant, operator, cleaner
  Route::get('employees', 'ManagerController@indexEmployee')->name('manager.employees.index');

  Route::get('employees/create', 'ManagerController@createEmployee')->name('manager.employees.create');
  Route::post('employees/store', 'ManagerController@storeEmployee')->name('manager.employees.store');

  Route::get('employees/{id}/edit', 'ManagerController@editEmployee')->name('manager.employees.edit');
  Route::patch('employees/{id}/update', 'ManagerController@updateEmployee')->name('manager.employees.update');

  Route::get('employees/{id}/delete', 'ManagerController@destroyEmployee')->name('manager.employees.destroy');

    //aturan tarif, gaji, insentif
      // /pricings /pricings/create /pricings/{id} /pricings/{id}/edit
  Route::get('pricings', 'ManagerController@indexPricing')->name('manager.pricings.index');

  Route::get('pricings/create', 'ManagerController@createPricing')->name('manager.pricings.create');
  Route::post('pricings/store', 'ManagerController@storePricing')->name('manager.pricings.store');

  Route::get('pricings/{id}/edit', 'ManagerController@editPricing')->name('manager.pricings.edit');
  Route::patch('pricings/{id}/update', 'ManagerController@updatePricing')->name('manager.pricings.update');

  Route::get('pricings/{id}/delete', 'ManagerController@destroyPricing')->name('manager.pricings.destroy');

  // /salaries /salaries/create /salaries/{id} /salaries/{id}/edit


  // /bonuses /bonuses/create /bonuses/{id} /bonuses/{id}/edit


});

/*
//accountant
Route::group(['prefix' => 'accountant', 'middleware' => 'auth'], function () {

  Route::get('/', function (){
    return 'all income outcome report';
  });

  Route::get('income', function () {
    return 'all income';
  });

  Route::get('income/create', function () {
    return 'create income form';
  });

  Route::get('income/1', function () {
    return 'income invoice';
  });

  Route::get('income/1/edit', function () {
    return 'edit income form only if needed always alert on create and edit';
  });

  Route::get('outcome', function () {
    return 'all outcome';
  });

  Route::get('outcome/create', function () {
    return 'create outcome form';
  });

  Route::get('outcome/1', function () {
    return 'outcome invoice';
  });

  Route::get('outcome/1/edit', function () {
    return 'edit outcome form only if needed always alert on create and edit';
  });

  Route::get('messages', function () {
    return 'list all message';
  });

  Route::get('messages/create', function () {
    return 'create messages';
  });

  Route::get('messages/1', function () {
    return 'display messages';
  });

  Route::get('messages/1/edit', function () {
    return 'edit messages';
  });

});

//operator
Route::group(['prefix' => 'operator', 'middleware' => 'auth'], function () {

  //stock
    //income
    //outcome
  //asset
    //income
    //outcome
  //message
    //tulis

  Route::get('stocks', function () {
    return 'list stock';
  });

  Route::get('stocks/income', function () {
    return 'create stock income';
  });

  Route::get('stocks/outcome', function () {
    return 'create stock outcome';
  });

  Route::get('stocks/1', function () {
    return 'display stock';
  });

  Route::get('stocks/1/edit', function () {
    return 'edit stock';
  });

  Route::get('assets', function () {
    return 'list asset';
  });

  Route::get('assets/income', function () {
    return 'create incoming asset form';
  });

  Route::get('assets/outcome', function () {
    return 'create outcome asset form';
  });

  Route::get('assets/1', function () {
    return 'display asset 1';
  });

  Route::get('assets/1/edit', function () {
    return 'edit asset 1';
  });

  Route::get('messages', function () {
    return 'list all message';
  });

  Route::get('messages/create', function () {
    return 'create messages';
  });

  Route::get('messages/1', function () {
    return 'display messages';
  });

  Route::get('messages/1/edit', function () {
    return 'edit messages';
  });

});

//client
Route::group(['prefix' => 'client', 'middleware' => 'auth'], function () {

  //topup
  Route::get('/', function () {
    return 'list top up, transaction';
  });

  Route::get('reload', function () {
    return 'top up form';
  });

  Route::get('reload/1', function () {
    return 'top up invoice';
  });

  Route::get('reload/1/edit', function () {
    return 'edit top up as long as not yet approved';
  });

});
*/
