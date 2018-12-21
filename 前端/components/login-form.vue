<template>
  <b-container>
    <b-input
      size="lg"
      name="名字"
      title="不得超过二十个字"
      placeholder="名字"
      @change="是否注册()"
      v-validate="'required|max:20'"
      v-model="名字"
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
    <b-btn v-if="注册状态===undefined" @click="$router.back()" size="lg" block>返回</b-btn>
    <b-btn v-if="注册状态===false" @click="注册()" variant="success" size="lg" block>注册</b-btn>
    <b-btn v-if="注册状态===true" @click="登录()" variant="primary" size="lg" block>登录</b-btn>
  </b-container>
</template>
<script>
export default {
  data: () => ({
    名字: "",
    密码: "",
    注册状态: undefined
  }),
  methods: {
    是否注册() {
      this.$axios
        .post("user/is_sign", {
          name: this.名字
        })
        .then(({ data }) => {
          this.注册状态 = data.msg;
        });
    },
    注册() {
      this.$axios
        .post("user/sign_up", {
          name: this.名字,
          pwd: this.密码
        })
        .then(({ data }) => {
          alert(data.msg ? "注册成功" : "注册失败");
        });
    },
    登录() {
      this.$axios
        .post("user/sign_in", {
          name: this.名字,
          pwd: this.密码
        })
        .then(({ data }) => {
          alert(data.msg ? "登录成功" : "登录成功");
        });
    }
  }
};
</script>
