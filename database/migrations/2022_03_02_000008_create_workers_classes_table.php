<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers_classes', function (Blueprint $table) {
            $table->foreignId('worker_id')->constrained('workers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('class_id')->constrained('my_classes')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers_classes');
    }
};
