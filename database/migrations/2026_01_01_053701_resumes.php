<?php

use App\Enums\Gender;
use App\Enums\MaritalStatus;
use App\Enums\MilitaryServiceStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('title');
            $table->boolean('is_active')->default(true);
            $table->decimal('completion_percentage', 5, 2)->default(0);

            $table->text('about_fa')->nullable();
            $table->text('about_en')->nullable();

            $table->enum('gender', array_column(Gender::cases(), 'value'));
            $table->enum('marital_status', array_column(MaritalStatus::cases(), 'value'));
            $table->enum('military_service_status', array_column(MilitaryServiceStatus::cases(), 'value'));
            $table->string('city');
            $table->string('region');
            $table->date('birth_date');
            $table->decimal('expected_salary_min', 15, 0)->nullable();
            $table->decimal('expected_salary_max', 15, 0)->nullable();

            $table->json('preferred_job_categories')->nullable();
            $table->json('contact_info')->nullable();
            $table->json('education')->nullable();
            $table->json('experience')->nullable();
            $table->json('languages')->nullable();
            $table->json('skills')->nullable();
            $table->json('awards')->nullable();
            $table->json('portfolio')->nullable();
            $table->json('complementary_skills_fa')->nullable();
            $table->json('complementary_skills_en')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id', 'is_active']);
            $table->index('completion_percentage');
        });
    }
};
