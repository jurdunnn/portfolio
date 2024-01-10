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
        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('is_intro')->default(false);
            $table->text('intro_text')->nullable();
            $table->string('cv_file')->nullable();
            $table->string('message_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('is_intro');
            $table->dropColumn('intro_text');
            $table->dropColumn('cv_file');
            $table->dropColumn('message_link');
        });
    }
};
