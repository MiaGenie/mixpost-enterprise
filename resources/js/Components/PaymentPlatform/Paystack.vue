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
        <ReadDocHelp :href="`${$page.props.mixpost.docs_link}/services/payment/paystack`"/>

        <VerticalGroup class="mt-lg">
            <template #title><label for="secret_key">Secret Key</label></template>
            <InputHidden v-model="form.credentials.secret_key" id="secret_key" autocomplete="off"/>
        </VerticalGroup>

        <VerticalGroup class="mt-lg">
            <template #title><label for="public_key">Public Key</label></template>
            <Input type="text" v-model="form.credentials.public_key" id="public_key" autocomplete="off"/>
        </VerticalGroup>
    </div>
</template>
