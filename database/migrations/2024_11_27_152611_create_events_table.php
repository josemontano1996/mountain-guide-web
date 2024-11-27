<?php

use App\Models\Category;
use App\Models\Country;
use App\Models\Event;
use App\Models\Region;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('duration');
            $table->tinyInteger('available_slots')->unsigned();
            $table->text('description');
            $table->string('main_photo_path');
            $table->tinyInteger('difficulty')->unsigned();
            $table->date('beginning_date');
            $table->date('ending_date');
            $table->tinyInteger('max_group_size')->unsigned();
            $table->enum('status', allowed: Event::$status)->default('open');
            $table->string('coordinates');
            $table->string('slug')->unique();

            $table->foreignIdFor(Category::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Country::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Region::class)->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
