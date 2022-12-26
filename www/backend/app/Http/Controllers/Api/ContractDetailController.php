<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\ContractdetailCollection;
use App\Models\Api\ContractDetail;
use App\Models\User;
use http\Exception\BadQueryStringException;

class ContractDetailController
{
    const ITEMS_ON_PAGE = 20;
    const ITEMS_ON_PAGE_MIN = 1;
    const ITEMS_ON_PAGE_MAX = 100;

    /**
     * Display a listing of the contract details.
     *
     * @return ContractDetailCollection
     */
    public function index(): ContractDetailCollection
    {
        /** @var User $user */
        $user = auth()->user();

        $query = ContractDetail::where('contract_id', $user->contract->id)
            ->orderBy('datetime','desc');

        // выбор по дате операции (from-to)
        if (request('from')) {
            $query->where('datetime', '<=', request('from'));
        }
        if (request('to')) {
            $query->where('datetime', '>', request('to'));
        }

        // выбор по типу операции (пополнение/списание)
        $type = request('type');
        if ($type) {
            if (!in_array($type, [ContractDetail::TYPE_ADDITION, ContractDetail::TYPE_DECREASE])) {
                throw new BadQueryStringException('Invalid parameter Type');
            }
            $comparison = $type == ContractDetail::TYPE_DECREASE ? '<=' : '>';
            $query->where('datetime', $comparison, 0);
        }

        // количество записей на страницу
        $onPage = min(
            max(
                request('on-page', self::ITEMS_ON_PAGE),
                self::ITEMS_ON_PAGE_MIN
            ),
            self::ITEMS_ON_PAGE_MAX
        );

        return new ContractDetailCollection(
            $query->paginate($onPage)
        );
    }
}
