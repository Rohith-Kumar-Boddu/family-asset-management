<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // `id`, `userid`, `familyid`, `details`, `status`, `created_at` 
        Schema::create('trials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userid');
            $table->string('familyid')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('trials');
    }
}
