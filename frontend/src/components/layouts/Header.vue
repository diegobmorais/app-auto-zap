<template>
    <header
        class="sticky top-0 z-50 w-full border-b bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60">
        <div class="container mx-auto px-4">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo -->
                <RouterLink to="/" class="flex items-center space-x-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-hero">
                        <MessageCircle class="h-5 w-5 text-primary-foreground" />
                    </div>
                    <span class="text-xl font-bold text-foreground">WhatsBot Pro</span>
                </RouterLink>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <RouterLink v-for="item in navigation" :key="item.name" :to="item.href" :class="[
                        'text-sm font-medium transition-colors hover:text-primary',
                        isActive(item.href)
                            ? 'text-primary border-b-2 border-primary'
                            : 'text-muted-foreground'
                    ]">
                        {{ item.name }}
                    </RouterLink>
                </nav>

                <!-- CTA Button -->
                <RouterLink to="/login">
                    <div class="hidden md:flex">
                        <button
                            class="bg-primary-hover hover:bg-primary-hover/90 font-medium text-white px-4 py-2 rounded-md transition-all">
                            Entrar
                        </button>
                    </div>
                </RouterLink>

                <!-- Mobile menu button -->
                <button class="md:hidden p-2" @click="toggleMenu" aria-label="Toggle menu">
                    <component :is="isMenuOpen ? X : Menu" class="h-6 w-6" />
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div v-if="isMenuOpen" class="md:hidden border-t bg-background">
                <div class="space-y-1 px-4 pb-4 pt-2">
                    <RouterLink v-for="item in navigation" :key="item.name" :to="item.href" :class="[
                        'block px-3 py-2 text-base font-medium transition-colors hover:text-primary',
                        isActive(item.href)
                            ? 'text-primary bg-accent'
                            : 'text-muted-foreground'
                    ]" @click="closeMenu">
                        {{ item.name }}
                    </RouterLink>

                    <!-- Mobile Entrar Button -->
                    <div class="pt-2">
                        <button
                            class="w-full bg-primary-hover hover:bg-primary-hover/90 text-white px-4 py-2 rounded-md">
                            Entrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script setup>
import { ref } from "vue";
import { useRoute } from "vue-router";
import { Menu, X, MessageCircle } from "lucide-vue-next";

const route = useRoute();
const isMenuOpen = ref(false);

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};
const closeMenu = () => {
    isMenuOpen.value = false;
};

const navigation = [
    { name: "A Empresa", href: "/company" },
    { name: "Planos", href: "/plans" },
    { name: "Serviços", href: "/services" },
    { name: "Blog", href: "/blog" },
    { name: "Contato", href: "/contact" },
];

const isActive = (path) => route.path === path;
</script>
