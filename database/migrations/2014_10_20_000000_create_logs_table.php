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
        Schema::create('log_access', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });

        Schema::create('log_events', function (Blueprint $table) {
            $table->id();
            $table->string('level')->nullable();
            $table->text('message')->nullable();
            $table->mediumText('details')->nullable();
            $table->timestamps();
        });

        Schema::create('log_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('status_code')->nullable();
            $table->string('url')->nullable();
            $table->text('referer')->nullable();
            $table->integer('count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_access');
        Schema::dropIfExists('log_events');
        Schema::dropIfExists('log_requests');
    }
};