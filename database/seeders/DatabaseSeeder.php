<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Country;
use App\Models\Event;
use App\Models\EventExtra;
use App\Models\EventIncluded;
use App\Models\EventMap;
use App\Models\EventNotIncluded;
use App\Models\EventPhoto;
use App\Models\EventPlan;
use App\Models\EventPrice;
use App\Models\Region;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Category::factory(5)->create();
        Category::factory(5)->isMain()->create();

        Country::factory(5)->create();

        Region::factory(10)->create();


        $categories = Category::all()->shuffle();

        $countries = Country::all()->shuffle();

        $regions = Region::all()->shuffle();

        for ($i = 0; $i <= 10; $i++) {
            $event = Event::factory()->create([
                'category_id' => $categories->random()->id,
                'country_id' => $countries->random()->id,
                'region_id' => $regions->random()->id,
            ]);

            $event->eventPhotos()->createMany(EventPhoto::factory(rand(0, 8))->make()->toArray());
            $event->eventPlans()->createMany(EventPlan::factory(rand(0, 7))->make()->toArray());
            $event->eventMaps()->createMany(EventMap::factory(rand(0, 4))->make()->toArray());
            $event->eventExtras()->createMany(EventExtra::factory(rand(0, 4))->make()->toArray());
            $event->eventNotIncludes()->createMany(EventNotIncluded::factory(rand(2, 6))->make()->toArray());
            $event->eventIncludes()->createMany(EventIncluded::factory(rand(4, 10))->make()->toArray());
            $event->eventPrices()->createMany(EventPrice::factory(rand(1, 4))->make()->toArray());
        }


    }
}
