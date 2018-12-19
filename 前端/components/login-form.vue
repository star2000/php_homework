<template>
  <b-form @submit.prevent="提交()">
    <b-input
      size="lg"
      name="名字"
      title="不得超过二十个字"
      placeholder="名字"
      v-validate="'required|max:20'"
      v-model.lazy="名字"
      v-b-tooltip.focus
    />
    <span class="text-danger">{{errors.first('名字')}}</span>
    <br>
    <b-input
      size="lg"
      name="密码"
      title="试试中文密码"
      placeholder="密码"
      v-model="密码"
      v-validate="'required|min:6'"
      v-b-tooltip.focus
    />
    <span class="text-danger">{{errors.first('密码')}}</span>
    <br>
    <b-btn size="lg" block>登录</b-btn>
  </b-form>
</template>
<script>
export default {
  watch: {
    名字(名) {
      this.$axios.post("user/check_name", { name: 名 }).then(({ data }) => {
        this.是否注册 = data.msg;
      })
    }
  }
};
</script>
