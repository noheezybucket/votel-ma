<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('programmes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('candidat_id')->unsigned();
            // $table->bigInteger('secteur_id')->unsigned();
            $table->string('titre');
            $table->text('contenu');
            $table->string('document');
            $table->timestamps();

            $table->foreign('candidat_id')->references('id')->on('candidats')->onDelete('cascade');
            // $table->foreign('secteur_id')->references('id')->on('secteurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programmes');
    }
};
