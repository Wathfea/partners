<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersPropertiesPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners_properties', function (Blueprint $table) {
            $table->unsignedInteger('partner_id')->index();
            $table->unsignedInteger('property_id')->index();
            $table->timestamps();

            $table->primary(['partner_id', 'property_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners_properties');
    }
}
