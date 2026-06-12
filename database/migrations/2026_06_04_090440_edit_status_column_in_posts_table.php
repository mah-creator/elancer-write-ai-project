<?php

use App\Enums\PostStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Change the 'status' column to be an enum with values 'draft', 'published', 'archived'
            $table->enum('status', array_column(PostStatus::cases(), 'value'))
                ->default(PostStatus::draft)
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->enum('status', ['draft', 'published', 'archived'])
                ->default('draft');
        });
    }
};
