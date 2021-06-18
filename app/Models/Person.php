<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'gender',
      'birthday'
    ];

    protected $casts = [
        'birthday'  => 'date:dd-mm-YYYY',
    ];

    public function getGenderAttribute()
    {

        switch ($this->attributes['gender'])
        {
            case 1:
                $this->attributes['gender']= "Erkek";
                break;
            case 2:
                $this->attributes['gender'] = "Kadın";
                break;
            case 3:
                $this->attributes['gender']= "Farketmez";
                break;
        }
        return $this->attributes['gender'];
    }

    public function getBirthdayAttribute()
    {
        return Carbon::parse($this->attributes['birthday'])->format('d-m-Y');
    }
    public function addresses()
    {
        return $this->hasMany(Address::class,'people_id','id');
    }
}
