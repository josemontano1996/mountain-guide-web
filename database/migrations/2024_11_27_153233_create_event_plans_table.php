<?php

use App\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_plans', function (Blueprint $table) {
            $table->id();

            $table->string('from_day');
            $table->string('to_day');
            $table->string('title');
            $table->text('description');
            $table->string('image_path')->nullable();

            // 0 N relationship with Event model
            $table->foreignIdFor(Event::class)->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_plans');
    }
};
