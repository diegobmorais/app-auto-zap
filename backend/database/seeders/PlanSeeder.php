<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;
use Illuminate\Support\Str;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Ouro',
                'slug' => Str::slug('Ouro'),
                'description' => 'Plano Ouro com todos os recursos premium liberados.',
                'price' => 199.90,
                'currency' => 'BRL',
                'billing_interval' => 'monthly',
                'users_limit' => 50,
                'whatsapp_connections' => 10,
                'messages_limit' => 100000,
                'trial_days' => 0,
                'features' => json_encode([
                    'multi_users' => true,
                    'api_access' => true,
                    'priority_support' => true,
                    'analytics' => true,
                ]),
                'sort_order' => 1,
            ],
            [
                'name' => 'Prata',
                'slug' => Str::slug('Prata'),
                'description' => 'Plano Prata com funcionalidades intermediárias.',
                'price' => 99.90,
                'currency' => 'BRL',
                'billing_interval' => 'monthly',
                'users_limit' => 20,
                'whatsapp_connections' => 5,
                'messages_limit' => 50000,
                'trial_days' => 0,
                'features' => json_encode([
                    'multi_users' => true,
                    'api_access' => true,
                    'priority_support' => false,
                    'analytics' => true,
                ]),
                'sort_order' => 2,
            ],
            [
                'name' => 'Bronze',
                'slug' => Str::slug('Bronze'),
                'description' => 'Plano Bronze básico para começar.',
                'price' => 49.90,
                'currency' => 'BRL',
                'billing_interval' => 'monthly',
                'users_limit' => 5,
                'whatsapp_connections' => 1,
                'messages_limit' => 10000,
                'trial_days' => 0,
                'features' => json_encode([
                    'multi_users' => false,
                    'api_access' => false,
                    'priority_support' => false,
                    'analytics' => false,
                ]),
                'sort_order' => 3,
            ],
            [
                'name' => 'Teste 7 Dias',
                'slug' => Str::slug('Teste 7 Dias'),
                'description' => 'Plano gratuito para testes, válido por 7 dias.',
                'price' => 0,
                'currency' => 'BRL',
                'billing_interval' => 'trial',
                'users_limit' => 2,
                'whatsapp_connections' => 1,
                'messages_limit' => 2000,
                'trial_days' => 7,
                'features' => json_encode([
                    'multi_users' => false,
                    'api_access' => false,
                    'priority_support' => false,
                    'analytics' => false,
                ]),
                'sort_order' => 4,
            ],
        ];

        foreach ($plans as $plan) {
            Plan::updateOrCreate(['slug' => $plan['slug']], $plan);
        }
    }
}
