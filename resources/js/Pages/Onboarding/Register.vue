<script setup>
import {Head, useForm, Link} from '@inertiajs/vue3';
import {inject} from "vue";
import MinimalLayout from "@/Layouts/Minimal.vue";
import Panel from "@/Components/Surface/Panel.vue";
import HorizontalGroup from "@/Components/Layout/HorizontalGroup.vue";
import Error from "@/Components/Form/Error.vue";
import Input from "@/Components/Form/Input.vue";
import Select from "@/Components/Form/Select.vue";
import PrimaryButton from "@/Components/Button/PrimaryButton.vue";
import Checkbox from "../../Components/Form/Checkbox.vue";
import VerticalGroup from "../../Components/Layout/VerticalGroup.vue";
import Flex from "../../Components/Layout/Flex.vue";
import Label from "../../Components/Form/Label.vue";

defineOptions({layout: MinimalLayout});

const routePrefix = inject('routePrefix');

const props = defineProps({
  invitation: {
    type: Object,
    required: true,
  },
});

const form = useForm({
  name: '',
  email: props.invitation.email,
  password: '',
  password_confirmation: '',
  timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
  terms: false,
});

const submit = () => {
  form.post(route(`${routePrefix}.register`))
}
</script>
<template>
  <Head :title="$t('onboarding.register')"/>

  <div class="w-full sm:max-w-lg mx-auto">
    <form @submit.prevent="submit">
      <Panel>
        <template #title>
          {{ $page.props.configs.register_title }}
        </template>
        <template #description>
          <div v-html="$page.props.configs.register_description" class="whitespace-pre"/>
        </template>

        <Error v-for="error in form.errors" :message="error" class="mb-xs"/>

        <HorizontalGroup>
          <template #title>
            <label for="name">{{ $t('general.name') }}</label>
          </template>

          <Input v-model="form.name" :error="form.errors.name" type="text" id="name" class="w-full" required
                 autofocus autocomplete="name"/>
        </HorizontalGroup>

        <HorizontalGroup class="mt-md">
          <template #title>
            <label for="email">{{ $t('onboarding.email_address') }}</label>
          </template>

          <Input v-model="form.email" :error="form.errors.email" type="email" id="email" class="w-full"
                 required autocomplete="username"/>
        </HorizontalGroup>

        <HorizontalGroup class="mt-md">
          <template #title>
            <label for="password">{{ $t('general.password') }}</label>
          </template>

          <Input v-model="form.password" :error="form.errors.password" type="password" id="password"
                 class="w-full" required autocomplete="new-password"/>
        </HorizontalGroup>

        <HorizontalGroup class="mt-md">
          <template #title>
            <label for="password_confirmation">{{ $t('general.confirm_password') }}</label>
          </template>

          <div class="w-full">
            <Input v-model="form.password_confirmation" :error="form.errors.password_confirmation"
                   type="password" id="password_confirmation" class="w-full" required
                   autocomplete="new-password"/>
          </div>
        </HorizontalGroup>

        <HorizontalGroup v-if="form.errors.timezone" class="mt-lg">
          <template #title>{{ $t('general.timezone') }}</template>

          <div>
            <Select v-model="form.timezone">
              <optgroup v-for="(list, groupName) in $page.props.timezone_list" :label="groupName">
                <option v-for="(timezoneName,timezoneCode) in list" :value="timezoneCode">
                  {{ timezoneName }}
                </option>
              </optgroup>
            </Select>
          </div>

          <template #footer>
            <Error :message="$t('dashboard.select_timezone')"/>
          </template>
        </HorizontalGroup>

        <VerticalGroup class="mt-lg">
            <Flex :responsive="false" class="items-center">
                <Checkbox v-model:checked="form.terms" id="terms" required/>
                <Label for="terms" class="!mb-0">
                    <span class="inline-block markdown" v-html="$page.props.configs.terms_accept_description"/>
                </Label>
            </Flex>
        </VerticalGroup>
      </Panel>

      <div class="flex items-center justify-between mt-lg">
        <PrimaryButton :disabled="form.processing" :indigo="true" type="submit">{{ $t('onboarding.register') }}
        </PrimaryButton>
        <Link :href="route('mixpost.login')" class="link-primary">{{ $t('onboarding.already_registered') }}</Link>
      </div>
    </form>
  </div>
</template>
