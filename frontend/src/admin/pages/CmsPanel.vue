<template>
    <Adminlayout>
    <div class="min-h-screen flex flex-col bg-muted/30">   

        <main class="flex-1 py-8">
            <div class="container mx-auto px-4">
                <!-- Header -->
                <div class="mb-8 flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-foreground mb-2">Painel de Administração</h1>
                        <p class="text-muted-foreground">Configure e personalize sua landing page</p>
                    </div>
                    <div class="flex gap-3">
                        <Button variant="outline" class="group">
                            <Eye class="h-4 w-4 mr-2" />
                            Visualizar Site
                        </Button>
                        <Button class="bg-primary-hover hover:bg-primary-hover/90 group">
                            <Save class="h-4 w-4 mr-2" />
                            Salvar Alterações
                        </Button>
                    </div>
                </div>

                <!-- Tabs -->
                <Tabs v-model="activeTab" class="space-y-6">
                    <TabsList class="grid w-full grid-cols-5">
                        <TabsTrigger value="content" class="flex items-center gap-2">
                            <Type class="h-4 w-4" /> Conteúdo
                        </TabsTrigger>
                        <TabsTrigger value="design" class="flex items-center gap-2">
                            <Palette class="h-4 w-4" /> Design
                        </TabsTrigger>
                        <TabsTrigger value="media" class="flex items-center gap-2">
                            <Image class="h-4 w-4" /> Mídia
                        </TabsTrigger>
                        <TabsTrigger value="pages" class="flex items-center gap-2">
                            <Settings class="h-4 w-4" /> Páginas
                        </TabsTrigger>
                        <TabsTrigger value="seo" class="flex items-center gap-2">
                            <Settings class="h-4 w-4" /> SEO
                        </TabsTrigger>
                    </TabsList>

                    <!-- Content Tab -->
                    <TabsContent value="content" class="space-y-6">
                        <div class="grid lg:grid-cols-2 gap-6">
                            <Card v-for="section in contentSections" :key="section.id" class="shadow-soft">
                                <CardHeader>
                                    <CardTitle class="flex items-center justify-between">
                                        {{ section.name }}
                                        <Badge variant="secondary">Ativa</Badge>
                                    </CardTitle>
                                </CardHeader>
                                <CardContent class="space-y-4">
                                    <template v-if="section.id === 'hero'">
                                        <div>
                                            <Label for="hero-title">Título Principal</Label>
                                            <Textarea v-model="section.fields.title" rows="3" />
                                        </div>
                                        <div>
                                            <Label for="hero-subtitle">Subtítulo</Label>
                                            <Textarea v-model="section.fields.subtitle" rows="2" />
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <Label for="cta-primary">CTA Primário</Label>
                                                <Input v-model="section.fields.ctaPrimary" />
                                            </div>
                                            <div>
                                                <Label for="cta-secondary">CTA Secundário</Label>
                                                <Input v-model="section.fields.ctaSecondary" />
                                            </div>
                                        </div>
                                    </template>

                                    <template v-if="section.id === 'stats'">
                                        <div class="grid grid-cols-3 gap-4">
                                            <div v-for="(stat, key) in section.fields" :key="key" class="space-y-2">
                                                <Label>Estatística {{ key.slice(-1) }}</Label>
                                                <Input v-model="stat.value" class="text-center font-bold" />
                                                <Input v-model="stat.label" class="text-sm" />
                                            </div>
                                        </div>
                                    </template>
                                </CardContent>
                            </Card>
                        </div>
                    </TabsContent>

                    <!-- Design Tab -->
                    <TabsContent value="design" class="space-y-6">
                        <div class="grid lg:grid-cols-2 gap-6">
                            <Card class="shadow-soft">
                                <CardHeader>
                                    <CardTitle>Cores do Tema</CardTitle>
                                </CardHeader>
                                <CardContent class="space-y-6">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div v-for="preset in colorPresets" :key="preset.name"
                                            class="p-4 border rounded-lg cursor-pointer hover:shadow-soft transition-shadow">
                                            <div class="flex items-center gap-3 mb-2">
                                                <div :style="{ backgroundColor: preset.primary }"
                                                    class="w-6 h-6 rounded-full border-2 border-white shadow-sm"></div>
                                                <div :style="{ backgroundColor: preset.secondary }"
                                                    class="w-6 h-6 rounded-full border-2 border-white shadow-sm"></div>
                                            </div>
                                            <p class="text-sm font-medium">{{ preset.name }}</p>
                                        </div>
                                    </div>

                                    <div class="space-y-4 pt-4 border-t">
                                        <div>
                                            <Label for="primary-color">Cor Primária</Label>
                                            <div class="flex gap-2">
                                                <Input type="color" v-model="colors.primary" class="w-16 h-10 p-1" />
                                                <Input v-model="colors.primary" class="flex-1" />
                                            </div>
                                        </div>
                                        <div>
                                            <Label for="secondary-color">Cor Secundária</Label>
                                            <div class="flex gap-2">
                                                <Input type="color" v-model="colors.secondary" class="w-16 h-10 p-1" />
                                                <Input v-model="colors.secondary" class="flex-1" />
                                            </div>
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>

                            <Card class="shadow-soft">
                                <CardHeader>
                                    <CardTitle>Tipografia</CardTitle>
                                </CardHeader>
                                <CardContent class="space-y-4">
                                    <div>
                                        <Label for="font-family">Fonte Principal</Label>
                                        <select v-model="typography.fontFamily"
                                            class="w-full px-3 py-2 border border-border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                                            <option value="inter">Inter (Atual)</option>
                                            <option value="roboto">Roboto</option>
                                            <option value="opensans">Open Sans</option>
                                            <option value="poppins">Poppins</option>
                                            <option value="montserrat">Montserrat</option>
                                        </select>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <Label for="heading-size">Tamanho Títulos</Label>
                                            <select v-model="typography.headingSize"
                                                class="w-full px-3 py-2 border border-border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                                                <option value="normal">Normal</option>
                                                <option value="large">Grande</option>
                                                <option value="xlarge">Extra Grande</option>
                                            </select>
                                        </div>
                                        <div>
                                            <Label for="body-size">Tamanho Texto</Label>
                                            <select v-model="typography.bodySize"
                                                class="w-full px-3 py-2 border border-border rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                                                <option value="small">Pequeno</option>
                                                <option value="normal">Normal</option>
                                                <option value="large">Grande</option>
                                            </select>
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>
                        </div>
                    </TabsContent>

                    <!-- Outras tabs (media, pages, seo) podem ser convertidas de forma similar -->
                </Tabs>
            </div>
        </main>       
    </div>
    </Adminlayout>
</template>

<script setup>

import Adminlayout from '../components/layouts/AdminLayout.vue'
import Button from '../../components/ui/Button.vue'
import Card from '../../components/ui/Card.vue'
import CardHeader from '../../components/ui/CardHeader.vue'
import CardContent from '../../components/ui/CardContent.vue'
import CardTitle from '../../components/ui/CardTitle.vue'
import Input from '../../components/ui/Input.vue'
import Textarea from '../../components/ui/TextArea.vue'
import Label from '../../components/ui/Label.vue'
import { Eye, Save, Type, Palette, Image, Settings } from 'lucide-vue-next'

import { reactive, ref } from 'vue'

const activeTab = ref('content')

const contentSections = reactive([
    {
        id: 'hero',
        name: 'Seção Hero',
        fields: {
            title: 'Transforme seu WhatsApp em um Help Desk Automático',
            subtitle: 'Atenda seus clientes 24/7 com nossa plataforma de automação inteligente.',
            ctaPrimary: 'Comece Agora Grátis',
            ctaSecondary: 'Ver Demonstração'
        }
    },
    {
        id: 'stats',
        name: 'Estatísticas',
        fields: {
            stat1: { value: '98%', label: 'Taxa de Resposta' },
            stat2: { value: '24/7', label: 'Atendimento' },
            stat3: { value: '-70%', label: 'Custos' }
        }
    }
])

const colorPresets = reactive([
    { name: 'Verde Militar (Atual)', primary: '#9FBF9E', secondary : '#7F9D7D' },
    { name: 'Azul (Padrão)', primary: '#3B82F6', secondary : '#2563EB' },
    { name: 'Roxo', primary: '#8B5CF6', secondary : '#7C3AED' },
    { name: 'Vermelho', primary: '#EF4444', secondary : '#DC2626' },
    { name: 'Amarelo', primary: '#FBBF24', secondary : '#F59E0B' }, 
    { name: 'Laranja', primary: '#FB923C', secondary : '#F97316' },
    { name: 'Verde', primary: '#22C55E', secondary : '#16A34A' },
    { name: 'Azul Claro', primary: '#3B82F6', secondary : '#1D4ED8' },
])

const colors = reactive({
    primary: '#3B82F6',
    secondary: '#2563EB'
})

const typography = reactive({
    fontFamily: 'inter',
    headingSize: 'normal',
    bodySize: 'normal'
})

</script>
