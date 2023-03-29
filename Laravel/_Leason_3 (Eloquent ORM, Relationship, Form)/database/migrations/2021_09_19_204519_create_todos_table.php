<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            #definimi i kolonave
            $table->id();#id , auto_incremnetm primary_key
            $table->string('title', 255);
            $table->boolean('completed')->default(0);  #false
            $table->timestamps(); //created_at -> CURRENT_TIMESTAMP, updated_at
        });
    }# per te krijuar kolonat  ne tabase "php artisan migrate"

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
