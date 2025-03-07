<script setup>
import HorizontalGroup from "../../Layout/HorizontalGroup.vue";
import Input from "../../Form/Input.vue";

const props = defineProps(['modelValue']);

const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <HorizontalGroup>
        <template #title>
            <div class="font-medium">{{ $t('general.count') }}</div>
        </template>

        <div class="w-24">
            <template v-if="!$attrs.readOnly">
                <Input
                    type="number"
                    :value="modelValue"
                    @update:modelValue="$emit('update:modelValue', $event)"
                    class="w-full"
                />
            </template>
            <template v-else>
                {{ modelValue }}
            </template>
        </div>
    </HorizontalGroup>
</template>
