<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'people_id',
        'address',
        'post_code',
        'city_name',
        'country_name',
    ];

    public function getAddressAttribute()
    {
        return Str::limit($this->attributes['address'], 30, '...') ;
    }

    public function country()
    {
        return $this->hasOne(Country::class,'id','country_name');
    }

    public function city()
    {
        return $this->hasOne(City::class,'id','city_name');
    }

    public function person()
    {
        return $this->belongsTo(Person::class,'people_id','id');
    }

}
