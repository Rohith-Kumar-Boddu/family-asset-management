<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // `id`, `userid`, `projectname`, `projectlocation`, `cost`, `familyid`, `details`, `created_at`
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userid');
            $table->string('projectname')->unique()->nullable();
            $table->string('projectlocation')->nullable();
            $table->float('cost',10,2)->default(0.00)->nullable();
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
        Schema::dropIfExists('projects');
    }
}
