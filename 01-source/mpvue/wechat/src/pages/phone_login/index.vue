<template>
<div>
  <p>!!!</p>
  <i-panel class="cell-panel-demo" title="cell 组">
    <i-cell-group>
      <i-cell title="只显示箭头" is-link></i-cell>
      <i-cell title="跳转到首页" is-link url="/pages/index/index"></i-cell>
      <i-cell title="只有 footer 点击有效" is-link url="/pages/index/index" only-tap-footer></i-cell>
      <block wx:if="{{ true }}">
        <i-cell title="单行列表" label="附加描述" value="详细信息"></i-cell>
        <i-cell title="表单">
          <input slot="footer" type="digit" placeholder="带小数点的数字键盘" />
        </i-cell>
      </block>
      <i-cell title="开关">
        <i-switch value="{{ true }}" @click="ionChange()" slot="footer">
          <i-icon type="right" slot="open"></i-icon>
          <i-icon type="close" slot="close"></i-icon>
        </i-switch>
      </i-cell>
    </i-cell-group>
  </i-panel>
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
