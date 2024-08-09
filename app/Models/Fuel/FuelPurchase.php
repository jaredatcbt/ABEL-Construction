<?php

namespace App\Models\Fuel;

use App\Abstracts\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuelPurchase extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["contact_id","quantity","unit_price","purchase_date"];

    protected $dates = ['deleted_at'];

    public function vendor()
    {
        return $this->belongsTo('App\Models\Common\Contact', 'contact_id', 'id');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    // protected static function newFactory()
    // {
    //     return \Modules\Fuel\Database\Factories\FuelPurchase::new();
    // }
}
