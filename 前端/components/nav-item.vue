<template>
  <li class="nav-item">
    <nuxt-link :to="href" class="nav-link">
      <slot/>
    </nuxt-link>
  </li>
</template>

<script>
export default {
  props: ["href"]
};
</script>
