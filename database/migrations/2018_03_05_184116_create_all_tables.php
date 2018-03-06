<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();

            $table->timestamps();
        });

        Schema::create('recruiters', function(Blueprint $table){
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');

            $table->timestamp('updated_at');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');

        });

        Schema::create('jobs', function(Blueprint $table){
            $table->increments('id');
            $table->integer('recruiter_id')->unsigned();
            $table->string('title');
            $table->string('description');
            $table->timestamps();

            $table->foreign('recruiter_id')
                ->references('id')
                ->on('recruiters')
                ->onDelete('cascade');
        });

        Schema::table('users', function(Blueprint $table){
            $table->integer('recruiter_id')->unsigned()->after('id');
            $table->string('photo_url')->nullable()->after('password');

            $table->foreign('recruiter_id')
                ->references('id')
                ->on('recruiters')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
        Schema::dropIfExists('recruiters');
        Schema::dropIfExists('jobs');
    }
}
