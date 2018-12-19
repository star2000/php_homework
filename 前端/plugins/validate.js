import Vue from 'vue';
import VeeValidate from 'vee-validate';
import zh_CN from 'vee-validate/dist/locale/zh_CN'


VeeValidate.Validator.localize('zh_CN', zh_CN)
Vue.use(VeeValidate, {
  locale: 'zh_CN'
});