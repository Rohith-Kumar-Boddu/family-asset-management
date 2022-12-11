<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // `id`, `userid`, `familyname`, `familylocation`, `created_at`
        Schema::create('families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userid')->nullable();
            $table->string('familyname')->nullable()->unique();
            $table->string('familylocation')->nullable();
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
        Schema::dropIfExists('families');
    }
}
