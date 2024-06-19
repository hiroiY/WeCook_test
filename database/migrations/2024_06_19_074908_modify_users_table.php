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
        Schema::table('users', function (Blueprint $table) {
            # add : role_id column
            $table->unsignedBigInteger('role_id')
                ->default(2)
                ->comment('admin:1 user:2')
                ->after('password');
            # add : avatar column
            $table->longText('avatar')
            ->nullable()
            ->after('role_id');
            
            #chenge : name column
            $table->string('name')->unique()->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('role_id');
            $table->string('name')->unique(false)->change();
        });
    }
};
