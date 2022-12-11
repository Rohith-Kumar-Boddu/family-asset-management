<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // `id`, `userid`, `propertylocation`, `units`, `sellingpriceperunit`, `familyid`, `details`, `created_at`
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userid');
            $table->string('propertylocation')->nullable();
            $table->bigInteger('units')->nullable();
            $table->float('sellingpriceperunit',10,2)->default(0.00)->nullable();
            $table->string('familyid')->nullable();
            $table->longText('details')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
