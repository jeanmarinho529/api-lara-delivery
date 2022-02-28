<?php

use App\Enums\WhatsappEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('trading_name', 80);
            $table->string('company_name', 150);
            $table->char('cnpj', 14)->unique('unq_stores_cnpj');
            $table->string('email')->unique('unq_stores_email');
            $table->string('phone', 11);
            $table->boolean('is_whatsapp')->default(WhatsappEnum::NOT_WPP);
            $table->string('lat', 100);
            $table->string('long', 100);
            $table->unsignedBigInteger('status_id');

            $table->foreign('status_id', 'fk_stores_status_id')
                ->references('id')
                ->on('status');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
