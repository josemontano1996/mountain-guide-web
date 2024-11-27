<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}



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

    $table->foreignId('category_id')->constrained()->onDelete('cascade');
    $table->timestamps();
});

Schema::create('event_photo', function (Blueprint $table) {
    $table->id();
    $table->string('url')->unique();

    $table->
    $table->timestamps();
});
