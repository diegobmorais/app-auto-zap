<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
         
            $table->decimal('price', 10, 2)->default(0);

            // Moeda (ex: BRL, USD)
            $table->string('currency', 8)->default('BRL');

            // Intervalo de cobrança
            $table->string('billing_interval')->default('monthly');

            // Limites e configurações
            $table->integer('users_limit')->nullable();        // null = ilimitado
            $table->integer('whatsapp_connections')->nullable(); // conexões simultâneas
            $table->bigInteger('messages_limit')->nullable();  // null = ilimitado
            $table->integer('trial_days')->default(0);

            // Recursos flexíveis em JSON
            $table->json('features')->nullable();

            // Campo para integrar com gateways
            $table->string('provider_price_id')->nullable();

            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
