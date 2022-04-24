<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSeekersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseekers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->bigInteger('phone')->unique();
            $table->string('email')->unique();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->date('dob');
            $table->string('profile_picture');
            $table->text('bio');
            $table->integer('cv_downloads')->default(0);
            $table->integer('profile_visit')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('job_seekers');
    }
}
