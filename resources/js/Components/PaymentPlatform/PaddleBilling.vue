<script setup>
import ReadDocHelp from "../Util/ReadDocHelp.vue";
import Select from "../Form/Select.vue";
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
        <ReadDocHelp :href="`${$page.props.mixpost.docs_link}/services/payment/paddle-billing`"/>

        <VerticalGroup class="mt-lg">
            <template #title><label for="vendor_id">API Key</label></template>
            <InputHidden v-model="form.credentials.api_key" id="vendor_id" autocomplete="off"/>
        </VerticalGroup>

        <VerticalGroup class="mt-lg">
            <template #title><label for="vendor_auth_code">Client Side Token</label></template>
            <InputHidden v-model="form.credentials.client_side_token" id="vendor_auth_code" autocomplete="off"/>
        </VerticalGroup>

        <VerticalGroup class="mt-lg">
            <template #title><label for="webhook_secret">Webhook secret key</label></template>
            <InputHidden v-model="form.credentials.webhook_secret" id="webhook_secret" autocomplete="off"/>
        </VerticalGroup>

        <VerticalGroup class="mt-lg">
            <template #title><label for="sandbox">Sandbox</label></template>
            <Select v-model="form.options.sandbox" id="sandbox">
                <option :value="false">{{ $t('general.no') }}</option>
                <option :value="true">{{ $t('general.yes') }}</option>
            </Select>
        </VerticalGroup>
    </div>
</template>
