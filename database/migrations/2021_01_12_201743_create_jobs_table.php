<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('recruiter_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->enum('type', ['onsite', 'freelance', 'remote']);
            $table->unsignedInteger('slots');
            $table->text('description')->nullable();
            $table->enum('status', ['open', 'closed']);
            $table->timestamps();
            $table->timestamp('expired_at', 0)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
