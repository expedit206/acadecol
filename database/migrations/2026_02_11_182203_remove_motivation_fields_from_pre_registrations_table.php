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
        Schema::table('pre_registrations', function (Blueprint $table) {
            $table->dropColumn([
                'motivation',
                'career_goals',
                'prior_knowledge',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pre_registrations', function (Blueprint $table) {
            $table->text('motivation')->nullable()->after('other_languages');
            $table->text('career_goals')->nullable()->after('motivation');
            $table->text('prior_knowledge')->nullable()->after('career_goals');
        });
    }
};
