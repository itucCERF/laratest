<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transition extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'member_id',
        'department_id',
        'user_id',
        'decided_img',
        'start_date',
        'end_date',
    ];

    /**
     * Get the Department of the Transition.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the Member of the Transition.
     */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}