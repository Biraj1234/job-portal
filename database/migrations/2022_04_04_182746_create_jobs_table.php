<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('employer_id')->constrained()->onDelete('cascade');
            $table->boolean('status')->default(0);
            $table->integer('views')->nullable();
            $table->integer('number_of_applicants')->nullable();
            $table->date('deadline')->nullable();
            $table->integer('no_of_vaccancy');
            $table->text('requirements');
            $table->text('benifits');
            $table->foreignId('job_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('job_level_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('jobs');
    }
}
