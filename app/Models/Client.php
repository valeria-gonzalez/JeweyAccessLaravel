<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'first_lastname', 'second_lastname', 'phone_number'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    public function setFirstLastnameAttribute($value)
    {
        $this->attributes['first_lastname'] = strtoupper($value);
    }

    public function setSecondLastnameAttribute($value)
    {
        $this->attributes['second_lastname'] = strtoupper($value);
    }
}
