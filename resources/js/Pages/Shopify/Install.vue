<script setup>
import { ref, computed } from 'vue'

// Принимаем пропсы от контроллера
const props = defineProps({
  shop: String,
  appName: String,
  appLogo: String,
  apiKey: String, // из Laravel .env
})

// Для ручного ввода магазина
const shopInput = ref(props.shop ?? '')

const redirectUri = encodeURIComponent('https://tandooria.com/authenticate')
const scopes = 'read_products,write_products'

function installApp() {
  if (!shopInput.value || !shopInput.value.endsWith('.myshopify.com')) {
    alert('Введите корректный домен магазина (например, example.myshopify.com)')
    return
  }

  const installUrl = `https://${shopInput.value}/admin/oauth/authorize?client_id=${props.apiKey}&scope=${scopes}&redirect_uri=${redirectUri}`
  window.location.href = installUrl
}
</script>

<template>
  <div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-6 py-12">
    <!-- Логотип -->
    <img
      v-if="appLogo"
      :src="appLogo"
      alt="App Logo"
      class="w-24 h-24 mb-6 rounded-full shadow-lg"
    />

    <!-- Название приложения -->
    <h1 class="text-3xl font-bold text-gray-800 mb-2">
      {{ appName }}
    </h1>

    <p class="text-gray-500 mb-6 text-center">
      Установите приложение в ваш Shopify-магазин
    </p>

    <!-- Поле для ввода shop-домена -->
    <input
      v-model="shopInput"
      placeholder="example.myshopify.com"
      class="border border-gray-300 rounded-lg px-4 py-2 w-full max-w-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
      type="text"
    />

    <!-- Кнопка установки -->
    <button
      @click="installApp"
      class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition duration-200 shadow-md"
    >
      Установить приложение
    </button>
  </div>
</template>
