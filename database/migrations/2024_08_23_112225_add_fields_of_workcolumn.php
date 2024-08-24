<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('register_price')->nullable();
            $table->boolean('has_paid')->default(false);
        });
    }

  
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('register_price');
            $table->dropColumn('has_paid');
        });
    }
};
