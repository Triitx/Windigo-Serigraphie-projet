<script setup lang="ts">
import { ref, watchEffect } from 'vue'

interface Props {
  modelValue: string | null
  type?: 'success' | 'danger' | 'info' | 'warning'
  duration?: number // durée avant fermeture auto (ms)
}

const props = withDefaults(defineProps<Props>(), {
  type: 'info',
  duration: 3000
})

const emit = defineEmits(['update:modelValue'])

const visible = ref(false)

watchEffect(() => {
  if (props.modelValue) {
    visible.value = true
    // auto fermeture
    setTimeout(() => {
      emit('update:modelValue', null)
      visible.value = false
    }, props.duration)
  }
})
</script>

<template>
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div
      v-if="visible && modelValue"
      class="toast align-items-center text-white border-0 show"
      :class="{
        'bg-success': type === 'success',
        'bg-danger': type === 'danger',
        'bg-info': type === 'info',
        'bg-warning text-dark': type === 'warning'
      }"
      role="alert"
    >
      <div class="d-flex">
        <div class="toast-body">
          {{ modelValue }}
        </div>
        <button
          type="button"
          class="btn-close btn-close-white me-2 m-auto"
          @click="$emit('update:modelValue', null)"
        ></button>
      </div>
    </div>
  </div>
</template>
