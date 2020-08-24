<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecryptedFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decrypted_file', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('uploaded_file_id')->unsigned();
            $table->foreign('uploaded_file_id')->references('id')->on('uploaded_file')->onDelete('cascade');
            $table->text('content');
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
        Schema::dropIfExists('decrypted_file');
    }
}
