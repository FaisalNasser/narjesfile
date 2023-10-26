<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ReportsEmail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use App\Customer;

use DB;
use App\User;
use Response;
use PDF;

class EmailController extends Controller
{

	public function index()
	{
		Mail::to('faisalnaser587@gmail.com')->send(new TestEmail());
		dd('Success! Email has been sent successfully.');
	}

	public function DailySales()
	{

		$query = DB::table("sales");
		$query->whereDay('sales.created_at', '=', date('d'));

		$sales = $query->select("*", "sales.id as id")->leftJoin("sale_items as s", "s.sale_id", '=', "sales.id")->orderBy('sales.created_at', 'DESC')->groupBy("s.sale_id")->get();

		$headers = array(
			'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
			'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
			'Content-Disposition' => 'attachment; filename=abc.csv',
			'Expires' => '0',
			'Pragma' => 'public',
		);
		$filename = "daily_sales.csv";

		$handle = fopen($filename, 'w');
		if (count($sales) > 0) {
			fputcsv(
				$handle,
				[
					"#",
					"Amount",
					"Discount",
					"Total Amount"
				]
			);
			$total_amount = 0;
			$total_discount = 0;

			foreach ($sales as $key => $sale) {
				fputcsv(
					$handle,
					[
						$key + 1,
						"$" . $sale->discount,
						"$" . $sale->amount,
					]
				);
			}
			$total_amount += $sale->amount;
			$total_discount += $sale->discount;

			fputcsv(
				$handle,
				[
					"Total",
					"$" . $sale->discount,
					"$" . $sale->amount,
				]
			);

			fclose($handle);

		}
		$content = array(
			"subject" => "Daily Sales",
			"message" => "Daily Sales",
			"sales" => $sales,
			"file" => $filename,
		);
		Mail::to("arfan67@gmail.com")->send(new ReportsEmail($content));
	}

}