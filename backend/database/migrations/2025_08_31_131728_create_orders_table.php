<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Empresa que fez a compra
            $table->foreignId('company_id')->constrained()->onDelete('cascade');

            // Plano contratado (pode ser nulo se o plano for removido posteriormente)
            $table->foreignId('plan_id')->nullable()->constrained('plans')->nullOnDelete();

            // Usuário que criou a ordem
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // Valores e pagamento
            $table->decimal('amount', 12, 2)->default(0);
            $table->string('currency', 8)->default('BRL');
            $table->string('payment_method')->nullable(); // ex: stripe, pix, boleto
            $table->string('transaction_id')->nullable(); // id retornado pelo gateway
            $table->string('invoice_url')->nullable();

            // Status da ordem
            $table->enum('status', ['pending', 'paid', 'failed', 'canceled', 'refunded'])->default('pending');

            // Datas relevantes
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('due_date')->nullable();

            // Metadados do pagamento / gateway
            $table->json('meta')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Índices úteis
            $table->index('status');
            $table->index('company_id');
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
