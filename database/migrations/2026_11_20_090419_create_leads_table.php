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
            $table->string('full_name');
            $table->string('mobile', 20);
            $table->string('email')->nullable();
            $table->string('loan_category');
            $table->decimal('loan_amount', 14, 2)->nullable();
            $table->decimal('monthly_income', 14, 2)->nullable();
            $table->string('employment_type')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode', 10)->nullable();
            $table->boolean('consent')->default(true);
            $table->string('status')->default('new');
            $table->string('preferred_bank')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('source_url')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
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
