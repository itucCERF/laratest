<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\DepartmentTrait;

class Department extends Model
{
    use HasFactory,
    DepartmentTrait,
    SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'description',
    ];

    /**
     * Get all Transitions of the Department.
     */
    public function transitions()
    {
        return $this->hasMany(Transition::class);
    }
}
