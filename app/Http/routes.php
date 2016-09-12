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

// use Illuminate\Support\Facades\App;
// use LaravelPusher;
// Route::auth();
Route::get('/jembatan', function (){
  // $message = 'mantap coyyy';
  // $pusherx = App::make('pusher');
  // LaravelPusher::trigger('my-channel', 'my-event', ['message' => $message]);
  $messages = [
    "id" => 5,
    "jenis" => 'afdsa',
    "no_kendaraan" => 'L 1334 H',
    "status" => 'Menunggu',
  ];
  LaravelPusher::trigger('antrian', 'newAntrian', $messages);
  return 'success';
});

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

Route::get('/home', 'HomeController@index')->name('home');

//route inti

Route::get('layarAntrian/{id}', 'GuestController@layarAntrian')->name('guest.layarAntrian');

//owner
Route::group(['prefix' => 'owner', 'middleware' => ['auth', 'role:owner']], function () {

  //input showrooms baru >> assign manager (detail n salary)
  Route::get('showrooms', 'OwnerController@indexShowroom')->name('owner.showrooms');

  Route::get('showrooms/create', 'OwnerController@createShowroom')->name('owner.showrooms.create');

  Route::post('showrooms/create', 'OwnerController@storeShowroom')->name('owner.showrooms.store');

  Route::get('showrooms/{id}/show', 'OwnerController@showShowroom')->name('owner.showrooms.show');
  Route::get('showrooms/{id}/delete', 'OwnerController@destroyShowroom')->name('owner.showrooms.destroy');

  Route::get('showrooms/{id}/edit', 'OwnerController@editShowroom')->name('owner.showrooms.edit');

  Route::patch('showrooms/{id}/update', 'OwnerController@updateShowroom');


  //input manager baru
    // /managers
  Route::get('managers', 'OwnerController@indexManager')->name('owner.managers.index');
  Route::get('managers/{id}/show', 'OwnerController@showManager')->name('owner.managers.show');
  Route::get('managers/create', 'OwnerController@createManager')->name('owner.managers.create');
  /*
  Route::get('managers/create', function (){
    return 'x bro';
  });
  */

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
  Route::get('employees/{id}/show', 'ManagerController@showEmployee')->name('manager.employees.show');

  Route::get('employees/create', 'ManagerController@createEmployee')->name('manager.employees.create');
  Route::post('employees/store', 'ManagerController@storeEmployee')->name('manager.employees.store');

  Route::get('employees/{id}/edit', 'ManagerController@editEmployee')->name('manager.employees.edit');
  Route::patch('employees/{id}/update', 'ManagerController@updateEmployee')->name('manager.employees.update');

  Route::get('employees/{id}/delete', 'ManagerController@destroyEmployee')->name('manager.employees.destroy');

    //aturan tarif, gaji, insentif
      // /pricings /pricings/create /pricings/{id} /pricings/{id}/edit
  Route::get('pricings', 'ManagerController@indexPricing')->name('manager.pricings.index');
  Route::get('pricings/{id}/show', 'ManagerController@showPricing')->name('manager.pricings.show');

  Route::get('pricings/create', 'ManagerController@createPricing')->name('manager.pricings.create');
  Route::post('pricings/store', 'ManagerController@storePricing')->name('manager.pricings.store');

  Route::get('pricings/{id}/edit', 'ManagerController@editPricing')->name('manager.pricings.edit');
  Route::patch('pricings/{id}/update', 'ManagerController@updatePricing')->name('manager.pricings.update');

  Route::get('pricings/{id}/delete', 'ManagerController@destroyPricing')->name('manager.pricings.destroy');

  // /salaries /salaries/create /salaries/{id} /salaries/{id}/edit


  // /bonuses /bonuses/create /bonuses/{id} /bonuses/{id}/edit

  // pindahan dari operator
  Route::get('materials', 'ManagerController@materialsIndex')->name('manager.materials.index');
  Route::get('materials/{id}/show', 'ManagerController@materialsShow')->name('manager.materials.show');
  Route::get('materials/create', 'ManagerController@materialsCreate')->name('manager.materials.create');
  Route::post('materials/store', 'ManagerController@materialsStore')->name('manager.materials.store');
  Route::get('materials/{id}/edit', 'ManagerController@materialsEdit')->name('manager.materials.edit');

  Route::get('materials/{id}/stock', 'ManagerController@materialsStock')->name('manager.materials.stock');
  Route::post('materials/{id}/update_stock', 'ManagerController@materialsUpdateStock')->name('manager.materials.updatestock');

  Route::patch('materials/{id}/update', 'ManagerController@materialsUpdate')->name('manager.materials.update');
  Route::get('materials/{id}/destroy', 'ManagerController@materialsDestroy')->name('manager.materials.destroy');

  Route::get('assets', 'ManagerController@assetsIndex')->name('manager.assets.index');
  Route::get('assets/{id}/show', 'ManagerController@assetsShow')->name('manager.assets.show');
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

  //tambah pelanggan
  //probably unused
  /*
  Route::get('clients', 'OperatorController@indexClient')->name('operator.clients.index');
  Route::get('clients/{id}/edit', 'OperatorController@editClient')->name('operator.clients.edit');
  Route::patch('clients/{id}/update', 'OperatorController@updateClient')->name('operator.clients.update');
  Route::get('clients/{id}/delete', 'OperatorController@destroyClient')->name('operator.clients.destroy');
  */

  //real operator
  // Route::get('clients/create', 'OperatorController@createClient')->name('operator.clients.create');
  Route::get('terimaPelanggan', 'OperatorController@terimaPelanggan')->name('operator.terimaPelanggan');
  Route::post('clientStore', 'OperatorController@clientStore')->name('operator.clientStore');
  Route::get('antrian', 'OperatorController@antrian')->name('operator.antrian');
  Route::get('antrian/{id}/show', 'OperatorController@antrianShow')->name('operator.antrian.show');
  // Route::get('layarAntrian', 'OperatorController@layarAntrian')->name('operator.layarAntrian');
  Route::get('updateStatus', 'OperatorController@updateStatus')->name('operator.updateStatus');


});


//cashier
Route::group(['middleware' => ['auth','role:cashier']], function () {

  //pindahan dari operator
  Route::get('antrianKasir', 'CashierController@antrian')->name('cashier.antrian');
  Route::get('antrianKasir/{id}/show', 'CashierController@antrianShow')->name('cashier.antrian.show');
  //list transaction in out
  Route::get('transactions', 'CashierController@index')->name('cashier.index');
  Route::get('transactions/{id}/show', 'CashierController@show')->name('cashier.show');

  //view detail transaction
  // Route::get('transactions/{id}', 'OperatorController@show')->name('operator.show');

  //create transaction form
  Route::get('transactions/create/{id}', 'CashierController@create')->name('cashier.create');
  Route::get('search/product', 'CashierController@autocompleteItem')->name('cashier.autocomplete');
  Route::get('search/customer', 'CashierController@autocompleteCustomer')->name('cashier.autocompleteCustomer');
  Route::post('transactions/additem', 'CashierController@additem')->name('cashier.additem');
  Route::get('transactions/deleteitem/{id}', 'CashierController@deleteitem')->name('cashier.deleteitem');
  Route::post('transactions/clearitems', 'CashierController@clearitems')->name('cashier.clearitems');
  Route::get('transactions/store', 'CashierController@store')->name('cashier.store');


  Route::get('transaction/{id}/export', 'CashierController@export')->name('cashier.transaction.export');

});


//client
Route::group(['prefix' => 'client', 'middleware' => ['auth', 'role:client']], function () {

  //topup
  Route::get('/transactions', 'ClientController@index')->name('client.transaction.index');
  Route::get('/transactions/{id}/show', 'ClientController@show')->name('client.transaction.show');
  Route::get('/transactions/{id}/export', 'ClientController@export')->name('client.transaction.export');

});
