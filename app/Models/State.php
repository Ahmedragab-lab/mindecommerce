<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Nicolaslopezj\Searchable\SearchableTrait;

class State extends Model
{
    use HasFactory,SearchableTrait;
    protected $guarded=[];
    public $timestamps = false;
    protected $searchable = [
        'columns' => [
            'states.name' => 10,
        ]
    ];
    public function Status()
    {
        return $this->status == 1 ? 'Active' : 'Inactive';
    }
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
