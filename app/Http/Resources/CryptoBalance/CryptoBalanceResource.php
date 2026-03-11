<?php

namespace App\Http\Resources\CryptoBalance;

use App\Http\Resources\BaseResource;
use App\Models\CryptoBalance\CryptoBalance;
use Illuminate\Http\Request;

/**
 * @author Valentina Lutsenko
 */
class CryptoBalanceResource extends BaseResource
{
    public function toArray(Request $request): array
    {
        /** @var CryptoBalance $this */
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'balance' => $this->balance,
        ];
    }
}
