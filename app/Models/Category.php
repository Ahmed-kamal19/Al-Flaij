<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $appends = ['name'];
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d'
    ];
    public function getNameAttribute()
    {
        return $this->attributes['name_' . getLocale()];
    }

    public function model()
    {
        return $this->belongsTo(Model::class, 'car_model_id');
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

}
