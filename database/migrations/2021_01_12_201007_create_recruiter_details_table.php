<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruiterDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('recruiter_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recruiter_id');
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('set null');
            $table->string('position_at_company')->nullable();
            $table->timestamps();

            $table->foreign('recruiter_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('recruiter_details');
    }
}
