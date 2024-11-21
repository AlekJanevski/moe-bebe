<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PatientBaby extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age', 'born_at', 'is_fed', 'is_sleeping', 'food_amount', 'weight', 'body_temperature', 'medicine_taken', 'appointment_date'];

    public function parents(): BelongsToMany
    {
        return $this->belongsToMany(PatientParent::class, 'patient_parent_child');
    }
}
