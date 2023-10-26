<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Validators\Failure;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use DB;
use Throwable;

class ProductImport implements
        ToCollection,
        WithHeadingRow,
        WithValidation,
        SkipsOnFailure


{
    /**
    * @param  Collection $collection
    * @param array
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable,
    SkipsFailures;

    public function collection(Collection $collection)
    {
        if(count($collection) > 0){
            foreach ($collection as $row){
            $data = Product::create([
                'category_id' => $row["category_id"],
                'barcode' => $row["barcode"],
                'name' => $row["name"],
                'description' => $row["description"],
                'titles' => $row["titles"],
                'prices' => $row["prices"],
                'quantity' => $row["quantity"],
                'lang' => $row["lang"],
                'enable' => $row["enable"],
                'codes' => $row["codes"],
                'tax_percentage' => $row["tax_percentage"]
            ]);
            DB::insert('insert into products_translation (product_id, lang, name, description, titles, prices, enable)
             values ('.$data->id.',"'.$row['lang'].'","'.$row['name'].'",'.json_encode($row['description'], JSON_UNESCAPED_UNICODE).','.json_encode($row['titles'], JSON_UNESCAPED_UNICODE) .','.json_encode($row['prices']).','.$row['enable'].')');
        }
    }

    }
    public function rules(): array
    {
        return [

            'name' => ['required'],
            //  'codes' => function($attribute, $value, $onFailure) {
            //     foreach(json_decode($value) as $item){

            //         $isExist = Product::where('codes','LIKE',"%\"".$item."\"%")->first();
            //         if($isExist != null){
            //             $onFailure(__("validation.codeUniqueError"));
            //         }

            //     }
            //   }
        ];

    }
    public function customValidationMessages()
    {
        return [
            'name.required' => __('validation.nameRequiredError'),
        ];
    }



}
