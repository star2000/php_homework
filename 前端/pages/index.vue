<template>
  <b-container>
    {{用户}}
  </b-container>
</template>
<script>
export default {
  asyncData({ $axios }) {
    return $axios.post("user/isLogin").then(({ data }) => ({ 用户: data }));
  }
};
</script>