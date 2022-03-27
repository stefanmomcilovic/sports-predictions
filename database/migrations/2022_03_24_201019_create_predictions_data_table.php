<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredictionsDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions_data', function (Blueprint $table) {
            $table->id('prediction_id');
            $table->json('prediction_data')->nullable()->default(null);
            $table->json('prediction_data_error')->nullable()->default(null);
            $table->timestamp('prediction_created_at')->useCurrent();
            $table->timestamp('prediction_updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('predictions_data');
    }
}
