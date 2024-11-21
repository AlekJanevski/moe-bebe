<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PatientParent extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    public function children(): BelongsToMany
    {
        return $this->belongsToMany(PatientBaby::class, 'patient_parent_baby');
    }
}
