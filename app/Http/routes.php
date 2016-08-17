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
    return view('owner.showrooms.create');
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

  // pindahan dari operator
  Route::get('materials', 'ManagerController@materialsIndex')->name('manager.materials.index');
  Route::get('materials/create', 'ManagerController@materialsCreate')->name('manager.materials.create');
  Route::post('materials/store', 'ManagerController@materialsStore')->name('manager.materials.store');
  Route::get('materials/{id}/edit', 'ManagerController@materialsEdit')->name('manager.materials.edit');

  Route::get('materials/{id}/stock', 'ManagerController@materialsStock')->name('manager.materials.stock');
  Route::post('materials/{id}/update_stock', 'ManagerController@materialsUpdateStock')->name('manager.materials.updatestock');

  Route::patch('materials/{id}/update', 'ManagerController@materialsUpdate')->name('manager.materials.update');
  Route::get('materials/{id}/destroy', 'ManagerController@materialsDestroy')->name('manager.materials.destroy');

  Route::get('assets', 'ManagerController@assetsIndex')->name('manager.assets.index');
  Route::get('assets/create', 'ManagerController@assetsCreate')->name('manager.assets.create');
  Route::post('assets/store', 'ManagerController@assetsStore')->name('manager.assets.store');
  Route::get('assets/{id}/edit', 'ManagerController@assetsEdit')->name('manager.assets.edit');
  Route::patch('assets/{id}/update', 'ManagerController@assetsUpdate')->name('manager.assets.update');

  Route::get('assets/{id}/stock', 'ManagerController@assetsStock')->name('manager.assets.stock');
  Route::post('assets/{id}/update_stock', 'ManagerController@assetsUpdateStock')->name('manager.assets.updatestock');

  Route::get('assets/{id}/destroy', 'ManagerController@assetsDestroy')->name('manager.assets.destroy');

});

//operator
Route::group(['middleware' => ['auth', 'role:operator']], function () {

  //pindahan dari accountant
  //list transaction in out
  Route::get('transactions', 'OperatorController@index')->name('operator.index');
  Route::get('transactions/{id}/show', 'OperatorController@show')->name('operator.show');

  //view detail transaction
  // Route::get('transactions/{id}', 'OperatorController@show')->name('operator.show');

  //create transaction form
  Route::get('transactions/create', 'OperatorController@create')->name('operator.create');
  Route::get('search/product', 'OperatorController@autocompleteItem')->name('operator.autocomplete');
  Route::get('search/customer', 'OperatorController@autocompleteCustomer')->name('operator.autocompleteCustomer');
  Route::post('transactions/additem', 'OperatorController@additem')->name('operator.additem');
  Route::get('transactions/deleteitem/{id}', 'OperatorController@deleteitem')->name('operator.deleteitem');
  Route::post('transactions/clearitems', 'OperatorController@clearitems')->name('operator.clearitems');
  Route::get('transactions/store', 'OperatorController@store')->name('operator.store');

  //tambah pelanggan
  Route::get('clients', 'OperatorController@indexClient')->name('operator.clients.index');
  Route::get('clients/create', 'OperatorController@createClient')->name('operator.clients.create');
  Route::post('clients/store', 'OperatorController@storeClient')->name('operator.clients.store');
  Route::get('clients/{id}/edit', 'OperatorController@editClient')->name('operator.clients.edit');
  Route::patch('clients/{id}/update', 'OperatorController@updateClient')->name('operator.clients.update');
  Route::get('clients/{id}/delete', 'OperatorController@destroyClient')->name('operator.clients.destroy');


});


//accountant
Route::group(['middleware' => ['auth','role:accountant']], function () {





});


/*
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
