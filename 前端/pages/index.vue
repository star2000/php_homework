<template>
  <b-container>
    <b-card header="登录/注册" header-class="text-center display-4">
      <login-form />
    </b-card>
  </b-container>
</template>
<script>
import loginForm from "~/components/login-form.vue";

export default {
  components: {
    loginForm
  }
};
</script>
