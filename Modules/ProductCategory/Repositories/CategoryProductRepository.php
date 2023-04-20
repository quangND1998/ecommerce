<?php
namespace Modules\ProductCategory\Repositories;
use App\BaseRepository;
use Modules\ProductCategory\Entities\CategoryProduct;

class CategoryProductRepository extends BaseRepository{

    
    /**
     * Init model associate with this repository
     */
    protected function model()
    {
        return new CategoryProduct();
    }

    public function get(){
        return $this->model()->whereNull('parent_id')
        ->with('childrenCategories')
        ->get();
    }

    public function category_parents(){
        return $this->model()->whereNull('parent_id')
        ->get();
    }

}
