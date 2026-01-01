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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('gender', array_column(Gender::cases(), 'value'));
            $table->enum('marital_status', array_column(MaritalStatus::cases(), 'value'));
            $table->enum('military_service_status', array_column(MilitaryServiceStatus::cases(), 'value'));
            $table->string('city')->index();
            $table->string('region')->index();
            $table->date('birth_date');
            $table->foreignId('job_category_id')->nullable()->constrained()->nullOnDelete();
            $table->text('about')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('phone')->nullable();
            $table->json('social_links')->nullable();
            $table->string('bm_code', 10)->unique()->index();
            $table->uuid('uuid')->unique()->index();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }
};
