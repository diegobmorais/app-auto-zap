<template>
    <div class="min-h-screen flex flex-col">
        <Header />

        <main class="flex-1">
            <!-- Hero Section -->
            <section class="bg-gradient-hero py-20">
                <div class="container mx-auto px-4">
                    <div class="max-w-4xl mx-auto text-center animate-fade-in">
                        <h1 class="text-4xl lg:text-5xl font-bold text-primary-foreground mb-6">
                            Entre em Contato
                        </h1>
                        <p class="text-xl text-primary-foreground/90 mb-8">
                            Nosso time de especialistas está pronto para ajudar você a transformar
                            seu atendimento no WhatsApp.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Contact Form & Info -->
            <section class="py-20">
                <div class="container mx-auto px-4">
                    <div class="grid lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
                        <!-- Contact Form -->
                        <div class="animate-slide-up">
                            <Card class="shadow-medium">
                                <CardHeader>
                                    <h2 class="text-2xl flex items-center mb-2">
                                        <MessageCircle class="h-6 w-6 mr-3 text-primary" />
                                        Fale Conosco
                                    </h2>
                                    <p class="text-muted-foreground">
                                        Preencha o formulário e retornaremos em breve.
                                    </p>
                                </CardHeader>
                                <CardContent>
                                    <form class="space-y-6">
                                        <div>
                                            <Label for="nome">Nome *</Label>
                                            <Input id="nome" placeholder="Seu nome completo" required />
                                        </div>

                                        <div>
                                            <Label for="email">Email *</Label>
                                            <Input id="email" type="email" placeholder="seu@email.com" required />
                                        </div>

                                        <div>
                                            <Label for="mensagem">Mensagem *</Label>
                                            <Textarea id="mensagem" placeholder="Conte-nos como podemos ajudar..."
                                                rows="5" required />
                                        </div>

                                        <Button type="submit"
                                            class="w-full bg-primary-hover hover:bg-primary-hover/90 group" size="lg">
                                            <Send class="h-4 w-4 mr-2" />
                                            Enviar Mensagem
                                        </Button>
                                    </form>
                                </CardContent>
                            </Card>
                        </div>

                        <!-- Contact Info -->
                        <div class="space-y-8 animate-fade-in">
                            <div>
                                <h2 class="text-2xl font-bold text-foreground mb-6">Informações de Contato</h2>
                                <div class="space-y-6">
                                    <div class="flex items-start space-x-4">
                                        <div
                                            class="w-12 h-12 bg-gradient-hero rounded-full flex items-center justify-center flex-shrink-0">
                                            <Mail class="h-6 w-6 text-primary-foreground" />
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-foreground mb-1">Email</h3>
                                            <p class="text-primary font-medium">contato@whatsbotpro.com</p>
                                            <p class="text-sm text-muted-foreground">Resposta em até 2 horas</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <Card class="shadow-soft">
                                <CardContent class="p-6">
                                    <h3 class="font-semibold text-foreground mb-4">Ação Rápida</h3>
                                    <div class="space-y-3">
                                        <Button class="w-full justify-start" variant="outline">
                                            <MessageCircle class="h-4 w-4 mr-2" />
                                            Iniciar Chat Online
                                        </Button>
                                        <Button class="w-full justify-start" variant="outline">
                                            <Phone class="h-4 w-4 mr-2" />
                                            Agendar Ligação
                                        </Button>
                                        <Button class="w-full justify-start bg-primary-hover hover:bg-primary-hover/90">
                                            <CheckCircle class="h-4 w-4 mr-2" />
                                            Solicitar Demonstração
                                        </Button>
                                    </div>
                                </CardContent>
                            </Card>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FAQ Section -->
            <section class="py-20 bg-muted">
                <div class="container mx-auto px-4">
                    <div class="max-w-4xl mx-auto">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl font-bold text-foreground mb-4">Perguntas Frequentes</h2>
                            <p class="text-lg text-muted-foreground">
                                Respostas rápidas para as dúvidas mais comuns.
                            </p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-8">
                            <Card class="shadow-soft">
                                <CardContent class="p-6">
                                    <h3 class="font-semibold text-foreground mb-3">Quanto tempo leva para implementar?
                                    </h3>
                                    <p class="text-muted-foreground">
                                        A implementação básica leva de 1 a 3 dias úteis, dependendo da complexidade dos
                                        fluxos.
                                    </p>
                                </CardContent>
                            </Card>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Map Section -->
            <section class="py-20">
                <div class="container mx-auto px-4">
                    <div class="max-w-6xl mx-auto">
                        <div class="text-center mb-12">
                            <h2 class="text-3xl font-bold text-foreground mb-4">Nossa Localização</h2>
                            <p class="text-lg text-muted-foreground">
                                Estamos localizados no coração de São Paulo.
                            </p>
                        </div>

                        <Card class="overflow-hidden shadow-medium">
                            <div class="aspect-video bg-muted flex items-center justify-center">
                                <div class="text-center">
                                    <MapPin class="h-12 w-12 text-primary mx-auto mb-4" />
                                    <p class="text-muted-foreground">Mapa interativo será carregado aqui</p>
                                    <p class="text-sm text-muted-foreground mt-2">São Paulo, SP - Brasil</p>
                                </div>
                            </div>
                        </Card>
                    </div>
                </div>
            </section>
        </main>

        <Footer />
    </div>
</template>

<script setup>
import Header from '@/components/layouts/Header.vue'
import Footer from '@/components/layouts/Footer.vue'
import Button  from '../components/ui/Button.vue'
import Card from '../components/ui/Card.vue'
import CardContent from '../components/ui/CardContent.vue'
import CardHeader from '../components/ui/CardHeader.vue'
import Input from '../components/ui/Input.vue'
import Textarea from '../components/ui/TextArea.vue'
import Label from '../components/ui/Label.vue'
import { Mail, Phone, MapPin, Clock, MessageCircle, Send, CheckCircle } from 'lucide-vue-next'
</script>
