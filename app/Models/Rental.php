
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'customer_id',
        'start_date',
        'end_date',
        'daily_rate',
        'total_days',
        'total_price',
        'status' // reserved, active, finished, canceled
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
