<template>
  <b-navbar toggleable="md" variant="white" class sticky>
    <b-navbar-toggle target="收缩导航"></b-navbar-toggle>
    <b-navbar-brand>
      <b-img-lazy src="/favicon.ico" alt="标志" height="50"/>
    </b-navbar-brand>
    <b-collapse is-nav id="收缩导航">
      <b-navbar-nav>
        <nav-item href="/">首页</nav-item>
      </b-navbar-nav>
      <b-navbar-nav class="ml-auto">
        <b-nav-item v-if="$store.state.用户" title="注销" @click="注销()">{{$store.state.用户}}</b-nav-item>
        <nav-item v-else href="/login">登录/注册</nav-item>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>
<script>
import navItem from "./nav-item";

export default {
  components: {
    navItem
  },
  methods: {
    注销() {
      this.$axios.post("user/logout").then(() => {
        this.$store.commit("设置用户", null);
      });
    }
  }
};
</script>
