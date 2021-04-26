<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function distributions()
    {
        return $this->hasMany(Distribution::class);
    }

    public function distributions_log()
    {
        return $this->hasMany(Distribution::class)->withTrashed();
    }

    public function last_distribution()
    {
        return $this->hasOne(Distribution::class)->latest();
    }

    protected $fillable = [
        'content'
    ];
}
