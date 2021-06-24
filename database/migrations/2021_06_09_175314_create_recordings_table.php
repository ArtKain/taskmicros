<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recordings', function (Blueprint $table) {           
            $table->id();
            $table->double('sum', 15, 2);
            $table->text('massege')->nullable();
            $table->foreignId('type_id')->constranined()->onDelete('cascade');
            $table->foreignId('category_id')->constranined()->onDelete('cascade');
            $table->foreignId('user_id')->constranined()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recordings');
    }
}
