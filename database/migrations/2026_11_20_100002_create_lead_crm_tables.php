<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Lead Allocations
        Schema::create('lead_allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained('leads')->cascadeOnDelete();
            $table->foreignId('previous_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('assigned_user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('allocated_by_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->text('remarks')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        // 2. Lead Activities Timeline
        Schema::create('lead_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained('leads')->cascadeOnDelete();
            $table->string('activity_type', 50); // lead_created, lead_allocated, lead_reassigned, lead_contacted, status_changed, followup_added, followup_completed, notes_added, customer_interest_updated, document_status_updated, lead_converted, lead_rejected
            $table->string('previous_value')->nullable();
            $table->string('new_value')->nullable();
            $table->text('description');
            $table->foreignId('updated_by_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('created_at')->useCurrent();
        });

        // 3. Lead Notes
        Schema::create('lead_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained('leads')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->text('note');
            $table->timestamp('created_at')->useCurrent();
        });

        // 4. Lead Follow-ups
        Schema::create('lead_followups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained('leads')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->date('followup_date');
            $table->time('followup_time')->nullable();
            $table->dateTime('reminder_at')->nullable();
            $table->string('status', 20)->default('pending'); // pending, completed, overdue, cancelled
            $table->string('call_outcome', 50)->nullable();
            $table->text('notes')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->timestamps();
        });

        // 5. Lead Documents
        Schema::create('lead_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained('leads')->cascadeOnDelete();
            $table->string('document_type', 50); // pan_card, aadhaar_card, salary_slips, bank_statement, itr_form16, photo, other
            $table->string('file_name');
            $table->string('file_path');
            $table->unsignedBigInteger('file_size')->nullable();
            $table->string('status', 20)->default('pending'); // pending, verified, rejected
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lead_documents');
        Schema::dropIfExists('lead_followups');
        Schema::dropIfExists('lead_notes');
        Schema::dropIfExists('lead_activities');
        Schema::dropIfExists('lead_allocations');
    }
};
