<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredictionsData extends Model
{
    use HasFactory;
    protected $table = 'predictions_data';
    protected $primaryKey = 'prediction_id';
    public $incrementing = true;

    protected $fillable = [
        'prediction_data',
        'prediction_created_at',
        'prediction_updated_at'
    ];

    public $timestamps = true;
    const CREATED_AT = 'prediction_created_at';
    const UPDATED_AT = 'prediction_updated_at';
}
