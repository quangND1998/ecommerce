<?php
namespace Modules\ProductCategory\Repositories;
use App\BaseRepository;
use Modules\ProductCategory\Entities\ProductImages;
use Modules\ProductCategory\Entities\ProductPrice;

class ProductPriceRepository extends BaseRepository{

    
    /**
     * Init model associate with this repository
     */
    protected function model()
    {
        return new ProductPrice();
    }



}
