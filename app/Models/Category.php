<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'is_main',
        'display'
    ];

    /**
     * Scope a query to include the count of events related
     * to the category.
     * @return void
     *  */

    public function scopeWithEventCount(Builder $query)
    {
        $query->withCount('events');
    }


    /**
     * Create a new Category instance from validated data.
     *
     * This method takes an array of validated data and uses it to create
     * a new Category instance in the database.
     *
     * @param array $validatedData An associative array of validated data.
     * @return \App\Models\Category The newly created Category instance.
     */
    static public function createFromValidatedData(array $validatedData)
    {
        return self::create($validatedData);
    }

    /**
     * Updates the given Category instance with the provided validated data.
     *
     * @param Category $category The Category instance to be updated.
     * @param array $validatedData The array of validated data to update the Category with.
     * @return bool True on success, false on failure.
     */
    static public function updateFromValidatedData(Category $category, array $validatedData)
    {
        return $category->update($validatedData);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
