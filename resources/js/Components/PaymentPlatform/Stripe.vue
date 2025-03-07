<script setup>
import Input from "../Form/Input.vue";
import ReadDocHelp from "../Util/ReadDocHelp.vue";
import VerticalGroup from "../Layout/VerticalGroup.vue";
import InputHidden from "../Form/InputHidden.vue";
import Label from "../Form/Label.vue";

defineProps({
    form: {
        type: Object,
        required: true,
    }
})
</script>
<template>
    <div>
        <ReadDocHelp :href="`${$page.props.mixpost.docs_link}/services/payment/stripe`"/>

        <VerticalGroup class="mt-lg">
            <template #title><label for="key">Publishable key</label></template>
            <Input type="text" v-model="form.credentials.key" id="key" autocomplete="off"/>
        </VerticalGroup>

        <VerticalGroup class="mt-lg">
            <template #title><label for="secret">Secret key</label></template>
            <InputHidden v-model="form.credentials.secret" id="secret" autocomplete="off"/>
        </VerticalGroup>

        <VerticalGroup class="mt-lg">
            <template #title><label for="webhook_secret">Webhook Signing secret</label></template>
            <InputHidden v-model="form.credentials.webhook_secret" id="webhook_secret" autocomplete="off"/>
        </VerticalGroup>
    </div>
</template>
