<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use function Deployer\add;
use function Deployer\parse;
use function Deployer\select;
use DB;
use Deployer\Collection\Collection;
use Illuminate\Support\Facades\Log;

class ProductExport implements WithHeadings, WithColumnWidths, WithStyles, FromCollection
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public $lang;
    public function __construct($lang)
    {
        $this->lang = $lang;
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A'=> 10,
            'B'=> 15,
            'C'=> 15,
            'D'=> 25,
            'E'=> 40,
            'F'=> 30,
            'G'=> 15,
            'H'=> 15,
            'I'=> 10,
            'J'=> 25,
            'K'=> 35,
            'L'=> 15,
            'M'=> 35,
        ];
    }

    public function headings(): array
    {
        // To Remove The Extra Column

        // $headers = DB::getSchemaBuilder()->getColumnListing("products");
        // $deleteHeaders=["is_delete", "created_at", "updated_at", "deleted_at"];
        // $headers[] = "Img Link";// Remove This When The Value Is Coming From Database
        // $headers = array_diff($headers, $deleteHeaders);
        $headers = [
            'id',
            'category_id',
            'barcode',
            'name',
            'description',
            'titles',
            'prices',
            'quantity',
            'lang',
            'enable',
            'codes',
            'tax_percentage',
            'Img Link'
        ];

//         $headers = DB::getSchemaBuilder()->getColumnListing("products");
//         $deleteHeaders=["is_delete", "created_at", "updated_at", "deleted_at"];
//         $headers[] = "Img Link";// Remove This When The Value Is Coming From Database
//         $headers = array_diff($headers, $deleteHeaders);

        return [$headers];
    }

    public function collection()
    {
        $data = DB::table('products')
        ->join('products_translation','products_translation.product_id','products.id')
        ->where('products_translation.lang','like', '%'.$this->lang.'%')
        ->select('products.id', 'products.category_id', 'products.barcode', 'products_translation.name', 'products_translation.description', 'products_translation.titles', 'products_translation.prices', 'products.quantity', 'products_translation.lang','products_translation.enable', 'products.codes', 'products.tax_percentage')
        ->get();
        // dd($data);
        foreach ($data as $item) {
            $item->id = $item->id == null?  $item->id = "": $item->id;
            $item->category_id = $item->category_id == null?  $item->category_id = "": $item->category_id;
            $item->barcode = $item->barcode == null?  $item->barcode = "": $item->barcode;
            $item->name = $item->name == null?  $item->name = "": $item->name;
            $item->description = $item->description == null?  $item->description = "": $item->description;
            $item->quantity = $item->quantity == null?  $item->quantity = "": $item->quantity;
            $item->lang = $item->lang == null?  $item->lang = "": $item->lang;

            $item->tax_percentage = $item->tax_percentage == null? "0": $item->tax_percentage;
            $item->enable = $item->enable == 0?  "0": $item->enable;

            $item->titles = json_decode($item->titles);
            $item->codes = json_decode($item->codes);
            $item->prices = json_decode($item->prices);

            $item->titles = json_encode($item->titles, JSON_UNESCAPED_UNICODE);
            $item->codes = json_encode($item->codes, JSON_UNESCAPED_UNICODE);
            $item->prices = json_encode($item->prices, JSON_UNESCAPED_UNICODE);


            $item->codes = str_replace("null", "\"\"",$item->codes);
            $item->titles = str_replace("null", "\"\"", $item->titles);
            $item->prices = str_replace("null", "\"\"", $item->prices);

            $item->link = "uploads/products/thumb/" . $item->id . ".jpg";
        }
        return $data;
    }
}
