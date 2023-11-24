<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'total', 'delivery_date', 'delivery_time', 'street',
        'apt_number', 'neighborhood', 'city', 'state',
        'country', 'zipcode', 'references', 'client_id',
        'user_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function setStreetAttribute($value)
    {
        $this->attributes['street'] = strtoupper($value);
    }

    public function setAptNumberAttribute($value)
    {
        $this->attributes['apt_number'] = strtoupper($value);
    }

    public function setNeighborhoodAttribute($value)
    {
        $this->attributes['neighborhood'] = strtoupper($value);
    }

    public function setCityAttribute($value)
    {
        $this->attributes['city'] = strtoupper($value);
    }

    public function setStateAttribute($value)
    {
        $this->attributes['state'] = strtoupper($value);
    }

    public function setCountryAttribute($value)
    {
        $this->attributes['country'] = strtoupper($value);
    }

    public function setZipcodeAttribute($value)
    {
        $this->attributes['zipcode'] = strtoupper($value);
    }

    public function setReferencesAttribute($value)
    {
        $this->attributes['references'] = strtoupper($value);
    }
}
