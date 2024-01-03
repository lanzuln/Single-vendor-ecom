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
        Schema::create('coupnes', function (Blueprint $table) {
           $table->id();
           $table->string('coupne_name')->unique();
           $table->unsignedSmallInteger('discount_amount')->default(0);
           $table->unsignedInteger('minimum_purchase')->default(0);
           $table->date('expire');
           $table->boolean('is_active')->default(true);
           $table->timestamp('created_at')->useCurrent();
           $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
           $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupnes');
    }
};
