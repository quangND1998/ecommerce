<?php
namespace Modules\ProductCategory\Repositories;
use App\BaseRepository;
use Modules\ProductCategory\Entities\CategoryProduct;
use Modules\ProductCategory\Entities\Product;

class ProductRepository extends BaseRepository{

    
    /**
     * Init model associate with this repository
     */
    protected function model()
    {
        return new Product();
    }



}
