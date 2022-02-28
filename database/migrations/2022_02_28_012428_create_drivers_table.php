<?php

use App\Enums\WhatsappEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->char('cpf', 11)->unique('unq_drivers_cpf');
            $table->string('email')->unique('unq_drivers_email');
            $table->string('phone', 11);
            $table->boolean('is_whatsapp')->default(WhatsappEnum::NOT_WPP);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id', 'fk_drivers_user_id')
                ->references('id')
                ->on('users');

            $table->foreign('status_id', 'fk_drivers_status_id')
                ->references('id')
                ->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
