<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodPressureMeasure extends Model
{
    use HasFactory;


    protected $fillable = ['high', 'low', 'bps', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
