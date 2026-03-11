<?php

namespace App\Http\Controllers\CryptoBalance;

use App\Http\Requests\CryptoBalance\CryptoBalanceRequest;
use App\Http\Resources\CryptoBalance\CryptoBalanceResource;
use App\Models\CryptoBalance\CryptoBalance;
use App\Repositories\CryptoBalance\CryptoBalanceRepository;
use App\Services\CryptoBalance\CryptoBalanceService;
use Exception;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Valentina Lutsenko
 */
readonly class CryptoBalanceController
{
    public function __construct(
        private CryptoBalanceService $cryptoBalanceService,
        private CryptoBalanceRepository $cryptoBalanceRepository,
    ) {}

    public function topUpBalance(CryptoBalanceRequest $request): CryptoBalanceResource
    {
        $balance = DB::transaction(function () use ($request): CryptoBalance {
            $balance = $this->cryptoBalanceRepository->getBalance($request->user_id);

            if (! $balance) {
                $balance = $this->cryptoBalanceRepository->createBalance($request->user_id);
            }

            $balance = $this->cryptoBalanceService->addBalance($balance, $request->amount);
            $this->cryptoBalanceRepository->save($balance);

            return $balance;
        });

        return CryptoBalanceResource::make($balance)->setStatusCode(Response::HTTP_OK);
    }

    public function withdrawBalance(CryptoBalanceRequest $request): CryptoBalanceResource
    {
        $balance = DB::transaction(function () use ($request): CryptoBalance {

            $balance = $this->cryptoBalanceRepository->getBalance($request->user_id);

            if (! $balance) {
                throw new Exception('Пополните баланс');
            }

            $balance = $this->cryptoBalanceService->deductBalance($balance, $request->amount);
            $this->cryptoBalanceRepository->save($balance);

            return $balance;
        });

        return CryptoBalanceResource::make($balance)->setStatusCode(Response::HTTP_OK);
    }
}
