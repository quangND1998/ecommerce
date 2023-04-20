<?php
namespace Modules\ProductCategory\Repositories;
use App\BaseRepository;
use Modules\ProductCategory\Entities\ProductImages;

class ProductImageRepository extends BaseRepository{

    
    /**
     * Init model associate with this repository
     */
    protected function model()
    {
        return new ProductImages();
    }



}
