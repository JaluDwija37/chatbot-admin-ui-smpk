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
        Schema::table('chat_histories', function (Blueprint $table) {
            $table->unsignedBigInteger('chatbot_status_id')->nullable()->after('confidence');
            $table->foreign('chatbot_status_id')
                ->references('id')
                ->on('chatbot_statuses')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chat_histories', function (Blueprint $table) {
            $table->dropForeign(['chatbot_status_id']);
            $table->dropColumn('chatbot_status_id');
        });
    }
};
