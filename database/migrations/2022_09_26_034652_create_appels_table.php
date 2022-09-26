<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('appels', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('sous_titre')->nullable();
            $table->longText('contenu');
            $table->dateTime('date_appel');
            $table->dateTime('date_limite');
            $table->string('publie_dans')->nullable();
            $table->string('autorite')->nullable();
            $table->foreignId('parution_id')->constrained();
            $table->foreignId('categorie_appel_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appels');
    }
}
