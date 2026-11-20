<?php

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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('reference_code', 30)->unique()->nullable();
            $table->string('full_name');
            $table->string('mobile', 20);
            $table->string('email')->nullable();
            $table->string('loan_category', 80);
            $table->decimal('loan_amount', 14, 2)->nullable();
            $table->decimal('monthly_income', 14, 2)->nullable();
            $table->string('employment_type', 50)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('pincode', 10)->nullable();
            $table->boolean('consent')->default(true);
            $table->string('status', 40)->default('new'); // new, allocated, contacted, followup_required, interested, documents_pending, application_started, qualified, converted, rejected, not_interested, no_response, duplicate
            $table->string('preferred_bank', 100)->nullable();
            $table->string('lead_source', 50)->default('Website');
            $table->string('campaign', 100)->nullable();
            $table->string('utm_source', 100)->nullable();
            $table->string('utm_medium', 100)->nullable();
            $table->string('utm_campaign', 100)->nullable();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('assigned_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('assigned_at')->nullable();
            $table->dateTime('next_followup_at')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('source_url')->nullable();
            $table->text('internal_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
