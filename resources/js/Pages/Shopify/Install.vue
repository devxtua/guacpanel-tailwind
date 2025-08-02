<script setup>
import { ref } from 'vue'
import { router, usePage } from '@inertiajs/vue3'

// Получаем параметры из Laravel (shop, appName, appLogo)
const page = usePage()
const prefilledShop = page.props.shop || ''
const appName = page.props.appName || 'Shopify App'
const appLogo = page.props.appLogo || null

const shop = ref(prefilledShop)

const installApp = () => {
  if (!shop.value) {
    alert('Please enter your Shopify store address')
    return
  }

  // Перенаправляем на маршрут установки
  router.visit(route('shopify.install', { shop: shop.value }))
}
</script>

<template>
  <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow text-center">
    <!-- Логотип приложения -->
    <div v-if="appLogo" class="mb-4">
      <img :src="appLogo" alt="App Logo" class="mx-auto h-50" />
    </div>

    <!-- Название приложения -->
    <h1 class="text-xl font-bold mb-4">Install {{ appName }}</h1>

    <!-- Поле для ввода магазина, если не передан -->
    <div v-if="!shop.value">
      <label class="block text-sm font-medium mb-1">Shop Address:</label>
      <input
        v-model="shop.value"
        placeholder="example.myshopify.com"
        class="w-full border px-3 py-2 rounded"
        type="text"
      />
    </div>

    <button
      class="mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700"
      @click="installApp"
    >
      Install App
    </button>
  </div>
</template>
