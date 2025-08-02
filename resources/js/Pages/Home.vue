<script setup>
import { usePage, router } from '@inertiajs/vue3'

const page = usePage()
const appName = page.props.appName
const appLogo = page.props.appLogo

const goToLogin = () => {
  router.visit('/login')
}

const goToRegister = () => {
  router.visit('/register')
}
</script>

<template>
  <div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 dark:bg-gray-900 p-6">
    <div class="text-center">
      <img
        v-if="appLogo"
        :src="appLogo"
        alt="App Logo"
        class="w-50 h-50 mx-auto mb-4"
      />
      <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">
        {{ appName }}
      </h1>

      <div class="flex gap-4 justify-center">
        <button
          @click="goToLogin"
          class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700"
        >
          Login
        </button>
        <button
          @click="goToRegister"
          class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300"
        >
          Register
        </button>
      </div>
    </div>
  </div>
</template>
