<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index' );
Route::get('/historia', 'PagesController@about');
Route::get('/inicio', 'PagesController@home' );
Route::get('/settings','PagesController@settings');
Route::get('/Juego2','PagesController@index2');


Route::get('/PJcreate', 'PJController@create');
Route::post('/PJcreate','PJController@store');


Route::get('/personajes/admin','PJController@index_admin');
Route::get('/personajes','PJController@index');
Route::get('/personajes/{slug?}','PJController@show');
Route::get('/personajes/{slug?}/edit','PJController@edit');
Route::post('/personajes/{slug?}/edit','PJController@update');
Route::post('/personajes/{slug?}/delete','PJController@destroy');
Route::post('/personajes/admin/{slug?}/delete','PJController@destroy_admin');
Route::post('/personajes/delete','PJController@delete_all');

Route::get('/registro_usuario','PJController@cargar_archivos');
Route::post('/renamePhoto','PJController@rename');

Route::post('/RacesAvailables','PJController@Races');

Route::post('/perfil/foto', 'PJController@updatePhoto');

Route::get('/Humanos','PagesController@Human');
Route::get('/Enanos', 'PagesController@Dwarf');
Route::get('/Elfos', 'PagesController@Elf');
Route::get('/Guerrero', 'PagesController@Warrior');
Route::get('/Picaro', 'PagesController@Rogue');
Route::get('/Mago', 'PagesController@Wizard');



//generamos los pdf de mordheim
Route::get('/personajes/{slug?}/printpdf','PJController@print')->name('personajes.pdf');


//ruta para que nos envíe emails automáticamente.
/*Route::get('sendemail',function(){
    $data = array(
        'name'=>"Curso Laravel",
    );

    Mail::send('personajes.welcome',$data,function ($message){
        $message->from('jacobopa58@gmail.com','Curso laravel');
        $message->to('jacobopa58@gmail.com')->subject('test email laravel');
    });
   return "tu email ha sido enviado correctamente";
});
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
