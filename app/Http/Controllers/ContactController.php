<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\ContactRequest;
use App\Models\Contact; # подключение файла модели с синтаксисом хранилища имен с использованием класса Model заданного по умолчанию

class ContactController extends Controller
{
    // ==============================================================

    # функция подключения посредника.Псевдоним посредника передается в параметр. Вторым параметром передается метод для которого запускается посредник.Возможна регистрация своего посредника
    // public function __construct()
    // {
    //     $this->middleware('auth', ['olny'=> 'submit']);

    // посредник будет запущен только для метода submit

    // ['exept'=> 'submit'] - посредник будет запущен для всех методов кроме submit
    // }

// ==================================================================

    public function submit(ContactRequest $req){ # public function submit  получает все данные из формы на странице /contact/submit в этой функции $req - это параметр ContactRequest - класс параметра который проверяет данные заполняемой формы

        // ============================================================

        // Auth::user(); # добавление пользователя для связи со статьей

        // ===========================================================

        // $this->validate($request, ['name' => 'required']); - проверка внутри контроллера без добавления класса проверки

       $contact = new Contact;
    //    создаем объект класса Contact из файла App\Models\Contact.php
       $contact->name= $req->input('name'); # функция input позволяет получить определенный параметр из формы.В выражении $contact->name переменная name ассоциируется с соответствующим полем в БД
       $contact->email= $req->input('email');
    //    $contact->email= $req->input('short_content');
       $contact->message= $req->input('message');

       $contact->save(); # функция сохраняет данные в БД

    //    для корректного отображения возможно нужно будет очистить командой  php artisan config:cache

       return redirect()->route('home')->with('success', 'Сообщение было добавлено');
    //    переадресация на домашнюю страницу  с выводом сообщения с помощью функции ->with "функция вызывает сессию success с заданным значением во втором параметре"
    }

    /* public function allData(){
        
        dd(Contact::all());
        return view ('messages', ['data' => Contact::all()]);
    } */
    public function allData(){ # получение всех данных из БД для передачи в шаблон view

        $contact = new Contact;
        // return view('messages', ['data' => $contact->OrderBy('id', 'asc')->take(2)->get()]);

        return view('messages', ['data' => $contact->all()]); # передача данных в шаблон view где первый параметр - название шаблона, а второй массив данных полученных из БД с помошью функции ->all
        # в параметре data "название может быть любым" записываем в качестве значения данные полученные из БД."в данном случае все записи"

    }

    public function showOneMessage($id){ # в параметр передается id записи которую нужно вывести на экран
        $contact = new Contact;
        return view('one-message', ['data' => $contact->find($id)] );
     # функция ->find() выводит выбранное поле из БД которое передается в параметр в качастве переменной
     # inRandomOrder()->first() выводит выводит только первую запись
     # inRandomOrder() ->get() выводит все записи в случайном порядке
     # take() - в параметр указывается нужное количество записей из БД
     # skip() - в параметр указывается колличество записей которые нужно пропустить при выводе по порядку "либо в случайном порядке"
     # where ('поле из БД', 'равно =, !=, >, <. и др. сравнения', 'значение для проверки') например  where('id', '=', '2')->get() - вывод записей с id = 2
    //  where('id', '<> ', '2')->get() - вывод записей у которых  id не равно 2
    }

    public function updateMessage($id){# в параметр передается id записи которую нужно найти для последующего обновления

        $contact = new Contact;
        return view('update-message', ['data' => $contact->find($id)] );

    }

    public function updateMessageSubmit($id, ContactRequest $req){# в первый параметр передается id выбранной записи которую нужно обновить и отправить в форме.Во второй параметр передаются поля из БД которые будут доступны для обновления на странице формы

        $contact = Contact::find($id); # предаем в параметр id записи которую нужно обновить
        $contact->name= $req->input('name'); # - поле записи которое нужно обновить
        $contact->email= $req->input('email'); # - поле записи которое нужно обновить
        // $contact->email= $req->input('short_content');
        $contact->message= $req->input('message'); # - поле записи которое нужно обновить
 
        $contact->save();
 
        return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обновлено');
     }
public function deleteMessage($id){ # функция удаления сообщения
    $contact = Contact::find($id)->delete();
    return redirect()->route('contact-data')->with('success', 'Сообщение было удалено');
}


}
