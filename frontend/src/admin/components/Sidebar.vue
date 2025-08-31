<template>
    <aside class="w-64 bg-green-800 text-white">
        <div class="p-4 text-xl font-bold">MeuSaaS Admin</div>
        <nav class="mt-6">
            <router-link to="/admin" class="block p-3 hover:bg-green-700">Dashboard</router-link>
            <router-link to="/admin/banner" class="block p-3 hover:bg-green-700">Editar Banner</router-link>
            <router-link to="/admin/plans" class="block p-3 hover:bg-green-700">Planos</router-link>
        </nav>
    </aside>
</template>