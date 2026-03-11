<?php

namespace App\Services\CryptoBalance;

use App\Models\CryptoBalance\CryptoBalance;
use Exception;

/**
 * @author Valentina Lutsenko
 */
class CryptoBalanceService
{
    public function addBalance(CryptoBalance $balance, float $amount): CryptoBalance
    {
        $balance->balance += $amount;

        return $balance;
    }

    /**
     * @throws Exception
     */
    public function deductBalance(CryptoBalance $balance, float $amount): CryptoBalance
    {
        if ($balance->balance < $amount) {
            throw new Exception("Недостаточно средсв");
        }

        $balance->balance -= $amount;

        return $balance;
    }
}
