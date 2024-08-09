<?php

namespace App\Models\Fuel;

use App\Abstracts\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuelUsage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["quantity","generator_id","vehicle_id","usage_date"];

    protected $dates = ['deleted_at'];

    public function vehicle()
    {
        return $this->belongsTo('Modules\Fuel\Models\FuelVehicle', 'vehicle_id', 'id');
    }

    public function generator()
    {
        return $this->belongsTo('Modules\Fuel\Models\FuelGenerator', 'generator_id', 'id');
    }
}
