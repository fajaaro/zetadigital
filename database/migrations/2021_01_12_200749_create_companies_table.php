<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registrant_id')->nullable();            
            $table->foreignId('subdistrict_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name');
            $table->string('image_profile_path')->nullable();
            $table->string('address');
            $table->boolean('confirmed')->default(0);
            $table->timestamps();

            $table->foreign('registrant_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
