<template>
  <b-card header="登录/注册" header-class="text-center display-4">
    <b-input
      size="lg"
      name="名字"
      title="不得超过二十个字"
      placeholder="名字"
      v-validate="'required|max:20'"
      v-model="name"
      v-b-tooltip.focus
    />
    <span class="text-danger">{{errors.first('名字')}}</span>
    <br>
    <b-input
      size="lg"
      name="密码"
      title="试试中文密码"
      placeholder="密码"
      v-model="pwd"
      v-validate="'required|min:6'"
      v-b-tooltip.focus
    />
    <span class="text-danger">{{errors.first('密码')}}</span>
    <br>
    <b-btn v-if="注册状态===true" @click="登录()" variant="primary" size="lg" block>登录</b-btn>
    <b-btn v-else-if="注册状态===false" @click="注册()" variant="success" size="lg" block>注册</b-btn>
    <b-btn v-else @click="$router.back()" size="lg" block>返回</b-btn>
  </b-card>
</template>
<script>
export default {
  data: () => ({
    name: "",
    pwd: "",
    注册状态: undefined
  }),
  watch: {
    name: _.debounce(function() {
      this.$validator.validate("名字").then(结果 => {
        if (结果) {
          this.$axios
            .post("user/isSign", {
              name: this.name
            })
            .then(({ data }) => {
              this.注册状态 = data;
            });
        } else {
          this.注册状态 = undefined;
        }
      });
    }, 500)
  },
  methods: {
    注册() {
      this.$validator.validate().then(结果 => {
        if (结果) {
          this.$axios
            .post("user/signUp", {
              name: this.name,
              pwd: this.pwd
            })
            .then(({ data }) => {
              if (data.code) {
                this.$router.push("/");
              } else {
                alert(data.msg);
              }
            });
        } else {
          alert(this.errors.first("*"));
        }
      });
    },
    登录() {
      this.$validator.validate().then(结果 => {
        if (结果) {
          this.$axios
            .post("user/signIn", {
              name: this.name,
              pwd: this.pwd
            })
            .then(({ data }) => {
              if (data.code) {
                this.$router.push("/");
              } else {
                alert(data.msg);
              }
            });
        } else {
          alert(this.errors.first("*"));
        }
      });
    }
  }
};
</script>
