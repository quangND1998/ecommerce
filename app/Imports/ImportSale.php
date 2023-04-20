<?php

namespace App\Imports;

use App\Jobs\ImportProductJob;
use App\Jobs\ImportSaleJob;
use App\Models\History_Account;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Jobs\ImportUserSale;
use Modules\ProductCategory\Entities\Product;

class ImportSale implements ToCollection, WithHeadingRow, WithChunkReading, SkipsOnError
{
    use Importable, SkipsErrors;
    protected $sale;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function __construct($sale)
    {

        $this->sale = $sale;
    }

    public function headingRow(): int
    {
        return 1;
    }
    public function collection(Collection $productCollections)
    {

        foreach ($productCollections as $key => $product) {
            dispatch(new ImportSaleJob($product, $this->sale));
        }
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
