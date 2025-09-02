<template>
    <div class="bg-green-50 font-sans text-gray-900">
        <!-- Conteúdo principal -->
        <main>
            <RouterView />
        </main>
    </div>
</template>

<style scoped>
/* Scroll suave e elegante */
main::-webkit-scrollbar {
    width: 8px;
}

main::-webkit-scrollbar-thumb {
    background-color: #b7d5ac;
    border-radius: 4px;
}

main::-webkit-scrollbar-track {
    background: #e6f0dc;
}
</style>
