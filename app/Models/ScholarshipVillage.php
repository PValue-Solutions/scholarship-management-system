<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScholarshipVillage extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'name',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scholarshipSchools()
    {
        return $this->hasMany(ScholarshipSchool::class);
    }
}
