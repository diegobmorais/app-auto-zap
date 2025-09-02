<template>
    <footer class="bg-muted border-t">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-8 mb-8">
                <!-- Brand -->
                <div class="lg:col-span-2">
                    <router-link to="/" class="flex items-center space-x-2 mb-4">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-hero">
                            <MessageCircle class="h-5 w-5 text-primary-foreground" />
                        </div>
                        <span class="text-xl font-bold text-foreground">WhatsBot Pro</span>
                    </router-link>

                    <p class="text-muted-foreground mb-4 max-w-sm">
                        A plataforma líder em automação de WhatsApp para empresas que buscam
                        excelência no atendimento ao cliente.
                    </p>

                    <!-- Contato -->
                    <div class="space-y-2 text-sm text-muted-foreground">
                        <div class="flex items-center">
                            <Mail class="h-4 w-4 mr-2" />
                            contato@whatsbotpro.com
                        </div>
                        <div class="flex items-center">
                            <Phone class="h-4 w-4 mr-2" />
                            (11) 99999-9999
                        </div>
                        <div class="flex items-center">
                            <MapPin class="h-4 w-4 mr-2" />
                            São Paulo, SP
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <div>
                    <h3 class="font-semibold text-foreground mb-4">Empresa</h3>
                    <ul class="space-y-2">
                        <li v-for="item in navigation.empresa" :key="item.name">
                            <router-link :to="item.href"
                                class="text-muted-foreground hover:text-primary transition-colors text-sm">
                                {{ item.name }}
                            </router-link>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold text-foreground mb-4">Produtos</h3>
                    <ul class="space-y-2">
                        <li v-for="item in navigation.produtos" :key="item.name">
                            <router-link :to="item.href"
                                class="text-muted-foreground hover:text-primary transition-colors text-sm">
                                {{ item.name }}
                            </router-link>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold text-foreground mb-4">Suporte</h3>
                    <ul class="space-y-2">
                        <li v-for="item in navigation.suporte" :key="item.name">
                            <router-link :to="item.href"
                                class="text-muted-foreground hover:text-primary transition-colors text-sm">
                                {{ item.name }}
                            </router-link>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold text-foreground mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li v-for="item in navigation.legal" :key="item.name">
                            <router-link :to="item.href"
                                class="text-muted-foreground hover:text-primary transition-colors text-sm">
                                {{ item.name }}
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom -->
            <div class="border-t pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-muted-foreground text-sm mb-4 md:mb-0">
                    © 2024 WhatsBot Pro. Todos os direitos reservados.
                </p>

                <!-- Redes sociais -->
                <div class="flex space-x-4">
                    <a v-for="item in socialLinks" :key="item.name" :href="item.href"
                        class="text-muted-foreground hover:text-primary transition-colors" :aria-label="item.name">
                        <component :is="item.icon" class="h-5 w-5" />
                    </a>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { MessageCircle, Mail, Phone, MapPin, Facebook, Twitter, Instagram, Linkedin } from 'lucide-vue-next'

const navigation = {
    empresa: [
        { name: 'Sobre Nós', href: '/company' },
        { name: 'Nossa Missão', href: '/company' },
        { name: 'Equipe', href: '/company' },
        { name: 'Carreiras', href: '/company' },
    ],
    produtos: [
        { name: 'Planos', href: '/plans' },
        { name: 'Recursos', href: '/services' },
        { name: 'Preços', href: '/plans' },
        { name: 'API', href: '/plans' },
    ],
    suporte: [
        { name: 'Central de Ajuda', href: '/plans' },
        { name: 'Documentação', href: '/plans' },
        { name: 'Contato', href: '/contact' },
        { name: 'Status', href: '/plans' },
    ],
    legal: [
        { name: 'Privacidade', href: '/company' },
        { name: 'Termos de Uso', href: '/company' },
        { name: 'Cookies', href: '/company' },
        { name: 'LGPD', href: '/company' },
    ],
}

const socialLinks = [
    { name: 'Facebook', icon: Facebook, href: '#' },
    { name: 'Twitter', icon: Twitter, href: '#' },
    { name: 'Instagram', icon: Instagram, href: '#' },
    { name: 'LinkedIn', icon: Linkedin, href: '#' },
]
</script>
