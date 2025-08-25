
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'plate',
        'make',
        'model',
        'year',
        'category',
        'daily_rate',
        'status', // available, rented, maintenance
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
