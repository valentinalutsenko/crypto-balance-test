<?php

namespace App\Http\Requests\CryptoBalance;

/**
 * @author Valentina Lutsenko
 */
class CryptoBalanceRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['int', 'required'],
            'amount' => ['numeric', 'required'],
        ];
    }
}
