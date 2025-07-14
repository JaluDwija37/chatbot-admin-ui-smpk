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
        Schema::table('unanswerd_questions', function (Blueprint $table) {
            $table->string('sender')->after('question')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unanswerd_questions', function (Blueprint $table) {
            $table->dropColumn('sender');
        });
    }
};
