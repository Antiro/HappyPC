<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('my_classes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->string('description');
            $table->double('prise');
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
};
