<template>
  <b-card header="登录/注册" header-class="text-center display-4">
    <b-input
      size="lg"
      name="名字"
      title="不得超过二十个字"
      placeholder="名字"
      v-validate="'required|max:20'"
      v-model="名字"
      v-b-tooltip.focus
      @change="验证()||是否注册()"
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
    <b-btn v-if="注册状态===true" @click="验证()||登录()" variant="primary" size="lg" block>登录</b-btn>
    <b-btn v-else-if="注册状态===false" @click="验证()||注册()" variant="success" size="lg" block>注册</b-btn>
    <b-btn v-else @click="$router.back()" size="lg" block>返回</b-btn>
  </b-card>
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
        .post("user/isSign", {
          name: this.名字
        })
        .then(({ data }) => {
          this.注册状态 = data;
        });
    },
    注册() {
      this.$axios
        .post("user/signUp", {
          name: this.名字,
          pwd: this.密码
        })
        .then(({ data }) => {
          alert(data ? "注册成功" : "注册失败");
        });
    },
    登录() {
      this.$axios
        .post("user/signIn", {
          name: this.名字,
          pwd: this.密码
        })
        .then(({ data }) => {
          alert(data ? "登录成功" : "登录失败");
        });
    },
    验证() {
      if (this.errors.any()) {
        this.注册状态 = undefined;
        return true;
      } else {
        return false;
      }
    }
  }
};
</script>
