<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    // protected $primaryKey = 'course_id';

    public function course_detail(): HasMany
    {
        return $this->hasMany(CourseDetail::class);
    }

    public function course_objective(): HasMany
    {
        return $this->hasMany(CourseObjective::class);
    }

    public function course_topic(): HasMany
    {
        return $this->hasMany(CourseTopic::class);
    }

    public function learning_material(): HasMany
    {
        return $this->hasMany(LearningMaterial::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
