<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblArchive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_archive', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('abstract');
            $table->string('keyword');
            $table->string('research_area');
            $table->string('country');
            $table->string('upload_files');
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
        Schema::dropIfExists('tbl_archive');
    }
}
