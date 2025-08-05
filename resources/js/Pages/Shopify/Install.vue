<script setup>
import { ref } from 'vue'
import { router, usePage } from '@inertiajs/vue3'

// Получаем данные от Laravel
const page = usePage()
const appName = page.props.appName || 'Shopify App'
const appLogo = page.props.appLogo || null

// Создаём реактивное значение для shop (с учётом возможности, что его уже передали)
const shop = ref('')
if (typeof page.props.shop === 'string' && page.props.shop.length > 0) {
  shop.value = page.props.shop
}

// Функция установки
const installApp = () => {
  if (!shop.value) {
    alert('Please enter your Shopify store address')
    return
  }

  // Перенаправляем пользователя на установку
  router.visit(route('shopify.install', { shop: shop.value }))
}
</script>

<template>
  <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow text-center">
    <!-- Логотип -->
    <div v-if="appLogo" class="mb-4">
      <img :src="appLogo" alt="App Logo" class="mx-auto h-24" />
    </div>

    <!-- Название -->
    <h1 class="text-xl font-bold mb-4">Install {{ appName }}</h1>

    <!-- Ввод адреса магазина -->
    <label class="block text-sm font-medium mb-1">Shop Address:</label>
    <input
      v-model="shop"
      placeholder="example.myshopify.com"
      class="w-full border px-3 py-2 rounded"
      type="text"
    />

    <!-- Кнопка установки -->
    <button
      class="mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700"
      @click="installApp"
    >
      Install App
    </button>
  </div>
</template>
