<template>
<div>
<i-panel class="cell-panel-demo">
 <i-cell-group>
       
    <i-cell title="大学类" >
   <i-icon type="time_fill" color="#57ceab" size="25" slot="icon" />
   </i-cell>
   <i-cell  title="英语四级" is-link url="/pages/exam/main" exppp="英语四级是2" @click="gettype(2)"></i-cell>
   <i-cell title="英语六级" is-link url="/pages/exam/main" exppp="英语六级是3" @click="gettype(3)"></i-cell> 
   <i-cell title="考研数学一" is-link url="/pages/exam/main" exppp="考研数学一是4" @click="gettype(4)"></i-cell>
   <i-cell title="考研数学二" is-link url="/pages/exam/main" exppp="考研数学二是5" @click="gettype(5)"></i-cell> 
   <i-cell title="考研政治" is-link url="/pages/exam/main" exppp="政治是1" @click="gettype(1)"></i-cell>  
  </i-cell-group>
</i-panel>
<!-- 需要递进的标签匹配关系  数据库的表需要修改  暂且先这样 -->

<view class="container">
  <ec-canvas id="mychart-dom-line" canvas-id="mychart-line" ec="{{ ec }}"></ec-canvas>
</view>

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
    gettype(title){
      console.log('e',title)
      this.globalData.subtype=title
      // console.log(this.globalData.subtype)
    },

    ionChange(e) {
      this.checked = !this.checked;
      this.$emit('change', this.checked);
    },
    kyzz () {
      this.globalData.type='1'
      const url = '../exam/main'
      if (mpvuePlatform === 'wx') {
        mpvue.switchTab({ url })
      } else {
        mpvue.navigateTo({ url })
      }
    },
  },
  created() {
     this.globalData.subtype=0;
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
