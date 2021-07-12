<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema; # подключение классов

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() # функция создания полей в БД запускается при миграции 'php artisan migration'
    {
        Schema::create('contacts', function (Blueprint $table) {
            # создание таблицы contacts в БД
            $table->bigIncrements('id'); # в таблице создает поле id с увеличивающимся инкрементом

            // ====================================================

            $table->integer('user_id')->unsigned()->nullable(); # в таблице создает поле user_id для идентификации пользователя(unsigned() - делает полученное число положительным)

            // ====================================================

            $table->string('name'); # в таблице создает поле name

            $table->string('email'); # в таблице создает поле email тип string с максимальным колличеством символов 255
            // $table->string('short_content');
            $table->text('message'); # в таблице создает поле email тип text
            $table->timestamps(); # в таблице создает 2 поля дата создания и дата обновления 

            // =========================================================

            # код ниже для удаления статей пользователя в случае удаления аккаунта

            $table
                ->foreign('user_id')
                ->referenses('id')
                ->on('contacts')
                ->onDelete('cascade');

            // =========================================================

        });

        #после написания данной функции нужно произвести миграцию в терминале коммандой  php artisan migrate после выполнения которой в БД добавятся указанные в функции Schema::create('contacts', function (Blueprint $table) данные
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() # функция удаления таблиц или отмены действия
    # вызывается командой в терминале php artisan migrate: rollback можно указывать количество шагов отката "--step = 3"
    # php artisan migrate: reset - очищает БД
    {
        Schema::dropIfExists('contacts'); # при вызове функции public function down() удалит таблицу contacts из БД
    }
}
