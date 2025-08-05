<script setup>
import { ref } from 'vue'
import draggable from 'vuedraggable'
import DefaultLayout from '@/Layouts/Default.vue'

defineOptions({
  layout: DefaultLayout,
})

const props = defineProps({
  columns: Array
})

function editColumn(column) {
  console.log('Редактировать колонку:', column.name)
}

const columns = ref(JSON.parse(JSON.stringify(props.columns)))
</script>

<template>
  <div class="p-6 bg-gray-50 min-h-screen">
    <h1 class="text-2xl font-bold mb-6">Kanban Board</h1>

    <!-- Kanban Board -->
    <draggable
    v-model="columns"
    group="columns"
    item-key="id"
    animation="200"
    handle=".column-header"
    class="flex gap-2 overflow-x-auto scroll-smooth snap-x"
    >
      <template #item="{ element: column }">
        <div class="min-w-[280px] max-w-[280px] snap-start flex flex-col rounded-xl  ">

            <!-- Header -->
            <div :class="['relative px-4 pt-3 pb-2 rounded-t-md column-header cursor-move', column.color]">
            <!-- Название и данные -->
            <h2 class="text-sm font-semibold">{{ column.name }}</h2>
            <p class="text-xs opacity-80">{{ column.tasks.length }} Opportunities</p>
            <p class="text-xs font-bold mt-1">£0.00</p>

            <!-- Кнопка карандаш -->
            <button
            @click="editColumn(column)"
            class="absolute top-2 right-2 text-white opacity-80 hover:opacity-100"
            title="Edit column"
            >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 20h9M16.5 3.5a2.121 2.121 0 113 3L7 19l-4 1 1-4 12.5-12.5z" />
            </svg>
            </button>

            </div>


          <!-- Tasks list with vertical scroll -->
          <draggable
            v-model="column.tasks"
            group="tasks"
            item-key="id"
            animation="200"
            class="flex flex-col gap-2 overflow-y-auto  py-3 "
            ghost-class="bg-gray-100"
            drag-class="opacity-50"
            :style="{ maxHeight: 'calc(100vh - 200px)' }"
          >
            <template #item="{ element }">
              <div class="bg-white p-4 rounded-md shadow-md border hover:shadow-lg transition cursor-move">
                <div class="text-sm font-semibold text-gray-800 mb-2">
                  {{ element.name }}
                </div>
                <div class="text-xs text-gray-500">
                  <p><strong class="text-gray-600">Business Name:</strong> {{ element.business }}</p>
                  <p><strong class="text-gray-600">Opportunity Source:</strong> quickbooks</p>
                  <p><strong class="text-gray-600">Opportunity Value:</strong> £0.00</p>
                </div>

                <!-- Action Icons -->
                <div class="flex justify-start gap-2 mt-3 text-gray-400 text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m2 4H7a2 2 0 01-2-2V7a2 2 0 012-2h3l2-2h2l2 2h3a2 2 0 012 2v12a2 2 0 01-2 2z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m-6-8h6" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2V11H3v6a2 2 0 002 2z" />
                  </svg>
                </div>
              </div>
            </template>
          </draggable>
        </div>
      </template>
    </draggable>
  </div>
</template>
