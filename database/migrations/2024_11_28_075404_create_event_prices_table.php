<?php

use App\Models\Event;
use App\Models\EventPrice;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_prices', function (Blueprint $table) {
            $table->id();
            $table->enum('type', allowed: EventPrice::$type);
            $table->tinyInteger('group_size')->unsigned();
            $table->float('price')->unsigned();
            
            //In case there is a discount, this information can be added
            $table->float('reference_price')->unsigned()->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();


            $table->foreignIdFor(Event::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_prices');
    }
};
