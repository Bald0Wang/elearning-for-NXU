<template>
<div>
  <p>您的成绩如下：</p>
  <br>
  <p style="size=18;color:blue; text-align:center">{{score}}分</p>
  <i-row i-class="row-class">
    <i-col span="12" i-class="col-class">
      <i-button @click="bindViewTapUrl('../paper/main')" type="ghost">再来一次</i-button>
    </i-col>
    <i-col span="12"  i-class="col-class "> 
      <i-button @click="bindViewTapSwitch('../user/main')" type="primary">返回主页</i-button>
    </i-col>
</i-row>
  
 
</div>
</template>

<script>
export default {
  data() {
    return {
      score:99,
      statue: {},
    }
  },
  methods: {
    bindViewTapSwitch (urls) {
      const url = urls
       mpvue.switchTab({url})   //跳转下方的主页式链接
    },
    bindViewTapUrl (urls) {
      const url = urls
       mpvue.navigateTo({url})   

    },
  },
  created() {
    // this.statue = false;
    // let self = this;

  },
  onLoad() {
  },
  onShow() {
    this.score=this.globalData.score
  },
   mounted() {
  },
}
</script>

<style>
.cell-panel-demo {
  display: block;
  margin-top: 15px;
}
</style>
