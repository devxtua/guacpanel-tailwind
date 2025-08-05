<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const shop = ref('')

const installApp = () => {
  if (!shop.value) {
    alert('Enter your shop address (example.myshopify.com)')
    return
  }

  router.visit(route('shopify.install', { shop: shop.value }))
}
</script>

<template>
  <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow text-center">
    <h1 class="text-xl font-bold mb-4">Install App</h1>

    <input
      v-model="shop"
      placeholder="example.myshopify.com"
      class="w-full border px-3 py-2 rounded"
      type="text"
    />

    <button
      class="mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700"
      @click="installApp"
    >
      Install App
    </button>
  </div>
</template>
