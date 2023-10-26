<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUseraddressToSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->string("useraddress");
            $table->string("invoiceAddress"); 
            $table->boolean("evaluateResult"); 
            $table->boolean("addresssame"); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn("useraddress");
            $table->dropColumn("invoiceAddress"); 
            $table->dropColumn("evaluateResult"); 
            $table->dropColumn("addresssame"); 

        });
    }
}
