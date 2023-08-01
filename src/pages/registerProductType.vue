<script setup>
import { useTheme } from 'vuetify'
import logo from '@/assets/logo.svg?raw'
import authV1MaskDark from '@/assets/images/pages/auth-v1-mask-dark.png'
import authV1MaskLight from '@/assets/images/pages/auth-v1-mask-light.png'
import authV1Tree2 from '@/assets/images/pages/auth-v1-tree-2.png'
import authV1Tree from '@/assets/images/pages/auth-v1-tree.png'
import axios from 'axios';
import { ref } from 'vue';


const form = ref({
  name: '',
})
const vuetifyTheme = useTheme()
const authThemeMask = computed(() => {
  return vuetifyTheme.global.name.value === 'light' ? authV1MaskLight : authV1MaskDark
})

const showSuccessSnackbar = ref(false);
const showErrorSnackbar = ref(false);
const snackbarColor = ref('success');
const successMessage = ref('');
const errorMessage = ref('');

function register() {
    // messages.value.splice(0)
    // notification.value = ""

    axios.post(
        'http://localhost:8000/api/product-types',
        {
            name: form.value.name,
        },
        {
            headers: {
                Accept: "application/json",
            },
        }
    ).then(function (response) {
        // handle success
        if (response.data.errors !== undefined) {
            notifyErrores(response.data.errors)
        } else {
            successMessage.value = 'Type Product registered successfully.';
            showErrorSnackbar.value = false;
            showSuccessSnackbar.value = true;
            resetForm();
        }
    })
        .catch(function (response) {
            if (response.response.data.errors !== undefined) {
                notifyErrores(response.response.data.errors)
            }
        })
}

function resetForm() {
    form.value.name = '';
}
</script>

<template>
  <div class="auth-wrapper d-flex align-center justify-center pa-4">
    <VCard
      class="auth-card pa-4 pt-7"
      max-width="448"
    >
      <VCardItem class="justify-center">
        <template #prepend>
          <div class="d-flex">
            <div v-html="logo" />
          </div>
        </template>

        <VCardTitle class="font-weight-semibold text-2xl text-uppercase">
          Soft Expert Test
        </VCardTitle>
      </VCardItem>

      <VCardText class="pt-2">
        <h5 class="text-h5 font-weight-semibold mb-1">
          Add a new product type
        </h5>
      </VCardText>

      <VCardText>
        <VForm @submit.prevent="register">
          <VRow>
            <!-- Username -->
            <VCol cols="12">
              <VTextField
                v-model="form.name"
                label="Name"
              />
            </VCol>

            <VCol cols="12">
              <VBtn
                block
                type="submit"
              >
                Register Product
              </VBtn>
            </VCol>
              <VCol cols="12">
                  <!-- Success Snackbar -->
                  <v-snackbar
                      v-model="showSuccessSnackbar"
                      :color="snackbarColor"
                      top
                      right
                      :timeout="3000"
                  >
                      {{ successMessage }}
                  </v-snackbar>

                  <!-- Error Snackbar -->
                  <v-snackbar
                      v-model="showErrorSnackbar"
                      color="error"
                      top
                      right
                      :timeout="3000"
                  >
                      {{ errorMessage }}
                  </v-snackbar>
              </VCol>
            <!-- auth providers -->
          </VRow>
        </VForm>
      </VCardText>
    </VCard>

    <VImg
      class="auth-footer-start-tree d-none d-md-block"
      :src="authV1Tree"
      :width="250"
    />

    <VImg
      :src="authV1Tree2"
      class="auth-footer-end-tree d-none d-md-block"
      :width="350"
    />

    <!-- bg img -->
    <VImg
      class="auth-footer-mask d-none d-md-block"
      :src="authThemeMask"
    />
  </div>
</template>

<style lang="scss">
@use "@core/scss/pages/page-auth.scss";
</style>

<route lang="yaml">
meta:
  layout: blank
</route>
