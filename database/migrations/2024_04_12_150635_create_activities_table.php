<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('type');
            $table->string('state');
            $table->boolean('availability')->default(false);
            $table->text('description')->nullable();
            $table->text('text')->nullable();
            $table->float('timing_wait')->nullable();
            $table->float('timing_build')->nullable();
            $table->float('timing_deploy')->nullable();
            $table->float('timing_execute')->nullable();

            $table->foreignId('environment_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};