<script setup>
import {inject, defineAsyncComponent, ref} from "vue";
import {useI18n} from "vue-i18n";
import {Head, useForm} from '@inertiajs/vue3';
import WorkspaceLayout from "@/Layouts/Workspace.vue";
import PageHeader from "../../../Components/DataDisplay/PageHeader.vue";

const TwitterServiceForm = defineAsyncComponent(() => import("@/Components/ServiceForm/TwitterServiceForm.vue"));

defineOptions({layout: WorkspaceLayout});

const {t: $t} = useI18n()

const routePrefix = inject('routePrefix');

const props = defineProps(['services'])

const form = useForm(props.services);

const tab = ref('twitter');
</script>
<template>
    <Head :title="$t('service.third_party_services')"/>

    <PageHeader :title="$t('service.third_party_services')" :with-padding-x="false">
        <template #description>
            {{ $t("service.third_party_services_desc") }}
        </template>
    </PageHeader>

    <div>
        <TwitterServiceForm :form="form.twitter"/>
    </div>
</template>
