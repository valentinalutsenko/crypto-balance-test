<?php

namespace App\Models\CryptoBalance;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @author Valentina Lutsenko
 *
 * Модуль учета крипто-баланса пользователя
 *
 * @property int $id // Идентификатор
 * @property int $user_id // Идентификатор пользователя
 * @property float $balance // Баланс пользователя
 * @property Carbon $created_at // Временная метка создания записи
 * @property Carbon $updated_at // Временная метка обновления записи
 *
 * @property-read User $user // Пользователь, которому принадлежит баланс
 */
class CryptoBalance extends Model
{
    protected $fillable = [
        'user_id',
        'balance',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
