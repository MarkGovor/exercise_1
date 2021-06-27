<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class CarModification extends Model
{
    use HasFactory, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_id',
        'title',
        'from_made',
        'to_made',
        'generation'
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
        'generation',
    ];

    /**
     * get parent car
     */
    public function car(){
        return $this->belongsTo(Car::class,'car_id', 'id');
    }
}
