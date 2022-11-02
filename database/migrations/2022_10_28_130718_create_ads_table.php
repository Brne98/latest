<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users','id');
            $table->foreignId('category_id')->constrained('categories', 'id');
            $table->string('title');
            $table->string('currency');
            $table->integer('price');
            $table->string('price_type');
            $table->string('owner_name');
            $table->string('owner_phone');
            $table->string('description');
            $table->string('slug');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('ads');
    }
};
