<template>
  <b-navbar toggleable="md" variant="white" sticky>
    <b-navbar-toggle target="收缩导航"></b-navbar-toggle>
    <b-navbar-brand>
      <b-img-lazy src="/favicon.ico" alt="标志" height="50"/>
    </b-navbar-brand>
    <b-collapse is-nav id="收缩导航">
      <b-navbar-nav>
        <nav-item href="/">首页</nav-item>
      </b-navbar-nav>
      <b-navbar-nav class="ml-auto">
        <nav-item href="/login">{{ 用户 }}</nav-item>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>
<script>
import navItem from "./nav-item";

export default {
  asyncData({ $axios }) {
    return $axios.post("user/isLogin").then(({ data }) => ({ 用户: data }));
  },
  components: {
    navItem
  }
};
</script>
