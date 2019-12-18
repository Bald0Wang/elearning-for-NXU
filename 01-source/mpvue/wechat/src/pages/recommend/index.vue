<template>
<div >
  <i-row>
    <i-col>
      <!-- 输入 -->
      <i-panel >
        <i-input value="{{ value1 }}" title="搜索" autofocus placeholder="2016考研政治" />
      </i-panel>
      <!-- 推荐表头 -->
      <i-tab-bar current="{{ current }}" bindchange="handleChange">
        <i-tab-bar-item key="homepage" icon="homepage" current-icon="homepage_fill" title="推荐"></i-tab-bar-item>
        <i-tab-bar-item key="group" icon="group" current-icon="group_fill" title="数学"></i-tab-bar-item>
        <i-tab-bar-item key="remind" icon="remind" current-icon="remind_fill" count="3" title="英语"></i-tab-bar-item>
        <i-tab-bar-item key="mine" icon="mine" current-icon="mine_fill" dot title="政治"></i-tab-bar-item>
      </i-tab-bar>
      <!--轮播图-->
      <Row>
        <Col span="24">
          <img  src="/static/images/bouner.png" style="width:100%;height:80px;" />
        </Col>
      </Row>
      <!--实战推荐-->

      <i-row>
        <i-col>实战推荐</i-col>
        <i-col style="margin-left:40%;">
          <i-button size="small" bind:click="handleClick" inline type="primary">更多>></i-button>
        </i-col>
      </i-row>
      <i-row>
        <i-col >
         <i-card full title="2019考研" extra="中级   1563" thumb="https://i.loli.net/2017/08/21/599a521472424.jpg">
              <view slot="content">2019考研数学习题详解...</view>
             
          </i-card>
        </i-col>
      </i-row>
      <i-row>
        <i-col >
         <i-card full title="2019考研" extra="高级   1140" thumb="https://i.loli.net/2017/08/21/599a521472424.jpg">
              <view slot="content">2019考研英语习题详解...</view>
             
          </i-card>
        </i-col>
      </i-row>
      <i-row>
        <i-col >
         <i-card full title="2019考研" extra="中级   1563" thumb="https://i.loli.net/2017/08/21/599a521472424.jpg">
              <view slot="content">2019考研政治习题详解...</view>
             
          </i-card>
        </i-col>
      </i-row>
      <i-row>
        <i-col >
         <i-card full title="2019考研" extra="中级   1563" thumb="https://i.loli.net/2017/08/21/599a521472424.jpg">
              <view slot="content">2019考研数一习题详解...</view>
             
          </i-card>
        </i-col>
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
.button-size {
  size:4px;
  margin-left:70%;
}
</style>
