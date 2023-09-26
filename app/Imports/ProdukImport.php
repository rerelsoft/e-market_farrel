<?php

namespace App\Imports;

use App\Models\Produk;
use illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProdukImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(collection $rows)
    {
        foreach ($rows as $row){
            Produk::create([
                'nama_produk' => $row['nama_produk']
            ]);
        }
        
    }
}
