<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch',
        'name',
    ];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}
