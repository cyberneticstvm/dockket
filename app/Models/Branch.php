<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specialization;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function specializations(){
        return $this->hasMany(Specialization::class, 'branch');
    }
}
