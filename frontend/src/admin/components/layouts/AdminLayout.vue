<template>
    <div class="min-h-screen flex w-full bg-gradient-subtle">
        <AdminSidebar :is-collapsed="isSidebarCollapsed" @toggle="toggleSidebar" />

        <div class="flex-1 flex flex-col py-6 p-8">
            <AdminHeader @toggle-sidebar="toggleSidebar" />

            <main class="flex-1 p-6 overflow-auto">
                <slot />
            </main>

            <AdminFooter />
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import AdminSidebar from '@/admin/components/layouts/AdminSidebar.vue'
import AdminHeader from '@/admin/components/layouts/AdminHeader.vue'
import AdminFooter from '@/admin/components/layouts/AdminFooter.vue'

const isSidebarCollapsed = ref(false)

const toggleSidebar = () => {
    isSidebarCollapsed.value = !isSidebarCollapsed.value
}
</script>