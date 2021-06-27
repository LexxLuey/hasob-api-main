<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('description')->nullable();
            $table->boolean('fixed_or_movable')->nullable();
            $table->string('picture_path')->nullable();
            $table->date('purchase_date')->nullable();
            $table->date('start_use_date')->nullable();
            $table->float('purchase_price')->nullable();
            $table->date('warranty_expiry_date')->nullable();
            $table->float('degradation_in_years')->nullable();
            $table->float('current_value_naira')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
