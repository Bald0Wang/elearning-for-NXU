<template>
<div>
  <i-row>
    <i-col>
      <i-cell-group>
        <i-cell title="分类" is-link url="/pages/dashboard/index"></i-cell>
      </i-cell-group>
    </i-col>
    <i-col>
     <i-button bind:click="handleClick" type="primary" size="small" >添加文件</i-button>
    </i-col>
  </i-row>
  <i-row>
      <!-- 输入 -->
      <i-panel >
        <i-input value="{{ value1 }}" title="搜索文件" autofocus placeholder="2016考研政治" />
      </i-panel>
  </i-row>

   <i-row>
    <i-col >
      <i-card full title="考研数学" extra="待审核" thumb="https://i.loli.net/2017/08/21/599a521472424.jpg">
          <view slot="content">2019考研数学习题详解...</view>
          
      </i-card>
    </i-col>
  </i-row>
  <i-row>
    <i-col >
      <i-card full title="考研英语" extra="待审核" thumb="https://i.loli.net/2017/08/21/599a521472424.jpg">
          <view slot="content">2019考研英语二习题详解...</view>
          
      </i-card>
    </i-col>
  </i-row>
  <i-row>
    <i-col >
      <i-card full title="考研政治" extra="待审核" thumb="https://i.loli.net/2017/08/21/599a521472424.jpg">
          <view slot="content">2019考研政治习题详解...</view>
          
      </i-card>
    </i-col>
  </i-row>
</div>
</template>

<script>
export default {
  computed: {
    count() {
      return {
        cityList: [{
            value: 'New York',
            label: 'New York'
          },
          {
            value: 'London',
            label: 'London'
          },
          {
            value: 'Sydney',
            label: 'Sydney'
          },
          {
            value: 'Ottawa',
            label: 'Ottawa'
          },
          {
            value: 'Paris',
            label: 'Paris'
          },
          {
            value: 'Canberra',
            label: 'Canberra'
          }
        ],
        model1: ''
      }
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
  size: 4px;
  margin-left: 70%;
}
</style>
