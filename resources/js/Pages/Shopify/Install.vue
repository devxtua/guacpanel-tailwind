<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const shop = ref('') // это ref
</script>

<template>
  <input
    v-model="shop"
    placeholder="example.myshopify.com"
    class="border px-3 py-2 rounded"
    type="text"
  />
</template>
