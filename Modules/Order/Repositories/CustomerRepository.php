<?php

namespace Modules\Order\Repositories;

use App\BaseRepository;
use Modules\Order\Entities\CustomerOrder;

class CustomerRepository extends BaseRepository
{
    protected function model()
    {
        return new CustomerOrder();
    }

    public function storeCustomer()
    {
    }
}
