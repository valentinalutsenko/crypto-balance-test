<?php

namespace App\Repositories\CryptoBalance;

use App\Models\CryptoBalance\CryptoBalance;
use App\Repositories\BaseRepository;

/**
 * @author Valentina Lutsenko
 */
class CryptoBalanceRepository extends BaseRepository
{
    public function getBalance(int $userId): ?CryptoBalance
    {
       return CryptoBalance::query()->where('user_id', $userId)->first();
    }

    public function createBalance(int $userId, float $initial = 0): CryptoBalance
    {
        return CryptoBalance::create([
            'user_id' => $userId,
            'balance' => $initial,
        ]);
    }
}
