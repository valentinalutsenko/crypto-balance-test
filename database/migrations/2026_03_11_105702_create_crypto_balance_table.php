<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @author Valentina Lutsenko
 */
return new class extends Migration
{
    private const TABLE = 'crypto_balance';
    public function up(): void
    {
        Schema::create(self::TABLE, static function (Blueprint $table): void {
            $table->comment('Модуль учета крипто-баланса пользователя');
            $table->id();
            $table->decimal('balance', 30, 15)->default(0)->comment('Баланс пользователя');
            $table
                ->foreignId('user_id')
                ->comment('Индификатор пользователя')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->index('user_id');

            $table->timestampTz('created_at')->comment('Временная метка создания записи');
            $table->timestampTz('updated_at')->comment('Временная метка обновления записи');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
};
