<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('telegram_id', 125)->nullable()->unique()->after('remember_token');
            $table->string('telegram_username', 125)->nullable()->after('telegram_id');
            $table->text('telegram_photo')->nullable()->after('telegram_username');
            $table->timestamp('telegram_auth_date')->nullable()->after('telegram_photo');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['telegram_id']);
            $table->dropColumn([
                'telegram_id',
                'telegram_username',
                'telegram_photo',
                'telegram_auth_date',
            ]);
        });
    }
};