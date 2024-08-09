<?php

namespace App\Models\Fuel;

use App\Abstracts\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuelGenerator extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["make","model"];

    protected $dates = ['deleted_at'];

    public function fuelUsed()
    {
        return $this->hasMany('Modules\Fuel\Models\FuelUsage', 'generator_id', 'id');
    }
}
