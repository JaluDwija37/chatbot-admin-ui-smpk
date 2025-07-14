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
        Schema::table('chatbot_statuses', function (Blueprint $table) {
            $table->float('learning_rate')->nullable()->after('status');
            $table->integer('batch_size')->nullable()->after('learning_rate');
            $table->string('optimizer')->nullable()->after('batch_size');
            $table->float('testing_percentage')->nullable()->after('optimizer');

            $table->float('accuracy')->nullable()->after('testing_percentage');
            $table->float('precision')->nullable()->after('accuracy');
            $table->float('recall')->nullable()->after('precision');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chatbot_statuses', function (Blueprint $table) {
            $table->dropColumn(['learning_rate', 'batch_size', 'optimizer', 'testing_percentage', 'accuracy', 'precision', 'recall']);
        });
    }
};
