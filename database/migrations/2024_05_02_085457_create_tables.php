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
        Schema::create('chauffeurs', function (Blueprint $table) {
            $table->id();
            $table->string('chauffeur_nom', 255);
            $table->string('chauffeur_prenom', 255);
            $table->string('chauffeur_email', 255)->unique();
            $table->string('chauffeur_tel', 20);
            $table->text('chauffeur_adresse');
            $table->string('chauffeur_statut', 50);
            $table->string('password', 255);
            $table->timestamps();
        });

        Schema::create('localisation_bus', function (Blueprint $table) {
            $table->id();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->timestamp('date_heure');
            $table->timestamps();
        });

        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('marque', 255);
            $table->string('modele', 255);
            $table->string('immatriculation', 255)->unique();
            $table->integer('capacite');
            $table->string('statut', 50);
            $table->timestamps();
        });

        Schema::create('vols', function (Blueprint $table) {
            $table->id();
            $table->string('provenance', 255);
            $table->string('destination', 255);
            $table->time('heure_arrivee');
            $table->time('heure_depart');
            $table->timestamps();
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_nom', 255);
            $table->string('client_type', 50);
            $table->timestamps();
        });

        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->string('contrat_type', 50);
            $table->date('date_debut');
            $table->date('date_fin');
            $table->foreignID('client_id')->index();
            $table->timestamps();
        });

        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->date('maintenance_date');
            $table->text('maintenance_description');
            $table->decimal('cout', 10, 2);
            $table->foreignID('bus_id')->index();
            $table->timestamps();
        });

        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->text('incident_description');
            $table->date('incident_date');
            $table->boolean('resolu');
            $table->foreignID('bus_id')->index();
            $table->timestamps();
        });

        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->time('heure_debut')->nullable();
            $table->time('heure_fin')->nullable();
            $table->string('statut_mission', 50)->nullable();
            $table->text('details_mission');
            $table->foreignID('bus_id')->index();
            $table->foreignID('chauffeur_id')->index();
            $table->foreignID('vol_id')->index();
            $table->timestamps();
        });

        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->integer('note')->check('note BETWEEN 1 AND 5');
            $table->text('commentaire');
            $table->foreignID('mission_id')->index();
            $table->timestamps();
        });

        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('reservation_date');
            $table->string('reservation_statut', 50);
            $table->foreignID('client_id')->index();
            $table->foreignID('mission_id')->index();
            $table->timestamps();
        });

        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->decimal('montant', 10, 2);
            $table->date('date');
            $table->foreignID('reservation_id')->index();
            $table->timestamps();
        });

        Schema::create('authentication_chauffeurs', function (Blueprint $table) {
            $table->id();
            $table->text('jeton_authentification');
            $table->timestamp('dernier_login');
            $table->foreignID('chauffeur_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authentication_chauffeurs');
        Schema::dropIfExists('paiements');
        Schema::dropIfExists('reservations');
        Schema::dropIfExists('missions');
        Schema::dropIfExists('feedbacks');
        Schema::dropIfExists('incidents');
        Schema::dropIfExists('maintenances');
        Schema::dropIfExists('contrats');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('vols');
        Schema::dropIfExists('buses');
        Schema::dropIfExists('localisation_bus');
        Schema::dropIfExists('chauffeurs');
    }
};
