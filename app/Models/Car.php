<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable;

class Car extends Model
{
    use HasFactory, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'from_made',
        'to_made',
        'image',
    ];

    /**
     * The attribute uses in the sort table
     *
     * @var array[]
     */
    public $sortable = [
        'id',
        'title',
        'from_made',
        'to_made',
    ];

    /**
     * Get modification
     *
     * @return HasMany
     */
    public function modifications(): HasMany
    {
        return $this->hasMany(CarModification::class, 'car_id', 'id');
    }
}
