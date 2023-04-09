<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'workers');
    }
}
