<template>
<div>
  <i-panel>
    <i-input value="{{ value1 }}" title="用户名" autofocus placeholder="用户名/邮箱/手机号" />
    <i-input value="{{ value1 }}" title="密码" autofocus placeholder="密码登录" />
  </i-panel>
  <i-button bind:click="handleClick" type="success">登录</i-button>
  <i-row i-class="demo-row">
    <i-col span="8" i-class="demo-col"><a href="" style="font-size:12px;text-align:center">手机号快速登录</a></i-col>
    <i-col span="8" i-class="demo-col light">&nbsp;</i-col>
    <i-col span="8" i-class="demo-col"><a style="font-size:12px;text-align:center">忘记密码</a></i-col>
</i-row>
</div>
</template>

<script>
export default {
  computed: {
    count() {
      return {}
    },
    data() {
      return {
        checked: true
      }
    },
  },
  methods: {
    ionChange(e) {
      this.checked = !this.checked;
      this.$emit('change', this.checked);
    }
  },
  mounted() {
    this.checked = false;
  },
}
</script>

<style>
.cell-panel-demo {
  display: block;
  margin-top: 15px;
}
</style>
