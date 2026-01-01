<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\MaritalStatus;
use App\Enums\MilitaryServiceStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resume extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'is_active',
        'completion_percentage',
        'about_fa',
        'about_en',
        'gender',
        'marital_status',
        'military_service_status',
        'city',
        'region',
        'birth_date',
        'expected_salary_min',
        'expected_salary_max',
        'preferred_job_categories',
        'contact_info',
        'education',
        'experience',
        'languages',
        'skills',
        'awards',
        'portfolio',
        'complementary_skills_fa',
        'complementary_skills_en',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'completion_percentage' => 'decimal:2',
        'birth_date' => 'date',
        'expected_salary_min' => 'decimal:0',
        'expected_salary_max' => 'decimal:0',
        'preferred_job_categories' => 'array',
        'contact_info' => 'array',
        'education' => 'array',
        'experience' => 'array',
        'languages' => 'array',
        'skills' => 'array',
        'awards' => 'array',
        'portfolio' => 'array',
        'complementary_skills_fa' => 'array',
        'complementary_skills_en' => 'array',
        'gender' => Gender::class,
        'marital_status' => MaritalStatus::class,
        'military_service_status' => MilitaryServiceStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
