<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { # отслеживание главной страницы
    
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Route:: resourse('contact' , 'ContactController') # код может объединить маршруты использующие один контроллер

#маршрут на страницу обновления записи
Route::get('/contact/all/{id}/update', "App\Http\Controllers\ContactController@updateMessage")->name('contact-update');

#маршрут на страницу отправки обновленной записи в форме
Route::post('/contact/all/{id}/update', "App\Http\Controllers\ContactController@updateMessageSubmit")->name('contact-update-submit');

Route::get('/contact/all/{id}/delete', "App\Http\Controllers\ContactController@deleteMessage")->name('contact-delete');

# {id} -  выражение для получения динамического id выбранной пользователем записи"название может быть любым"
Route::get('/contact/all/{id}', "App\Http\Controllers\ContactController@showOneMessage")->name('contact-data-one');
Route::get('/contact/all', "App\Http\Controllers\ContactController@allData")->name('contact-data');
Route::post('/contact/submit', "App\Http\Controllers\ContactController@submit")->name('contact-form');


// /contact/submit - URL адрес
// "App\Http\Controllers\ContactController@submit" - путь к контролеру ContactControlle с ВЫЗОВОМ НУЖНОГО МЕТОДА submit который указывается через собачку

// функция ->name содержит параметр contact-form.Это имя URL обработчика для обращенияя к нему в других участках кода c помощью команды {{route('contact-form')}}.Двойные скобки нужны для передачи динамического контента.Удобно использование для ссылок и изменения адресов.




// ==================================================================


Route:: get('/foo', ['middleware' => 'manager',  function()
{
    return 'эту страницу может увидеть только менеджер';
}
]);


// =================================================================