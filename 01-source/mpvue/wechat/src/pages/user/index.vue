<template>
<div>
  <view style="margin: 16px">个人</view>
  <i-card full :title="statue.nickName" :extra="statue.gender" :thumb="statue.avatarUrl">
    <view slot="content">{{statue.province}}</view>
    <view slot="footer">{{statue.country}}</view>
  </i-card>
  <p>userid:{{userid}}</p>
 

  <i-row>
    <i-col>
      <i-grid>
        <i-grid-item>
          <i-icon size="24" type="integral" /> 最高分{{scorest.max}}分
        </i-grid-item>
        <i-grid-item>
          <i-icon size="24" type="integral_fill" /> 最低分{{scorest.min}}分
        </i-grid-item>
      </i-grid>
    </i-col>

    <i-col>
      <i-grid>
        <i-grid-item>
          <i-icon size="24" type="unfold" />平均正确率{{scorest.avg}}%
        </i-grid-item>
        <i-grid-item>
          <i-icon size="24" type="more" />下次预测{{scorest.will}}分
        </i-grid-item>
      </i-grid>
    </i-col>
  </i-row>
</div>
</template>

<script>
export default {
  // computed: {
  //   count() {
  //     return {}
  //   },
  // },
  data() {
    return {
      statue: {},
      // nickname: "👻",
      pic: "https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTL5DMpiaOsWCRSUpLLNDygajmFAsMZ3vyjkGkSFeMqOntzALGziammR6FJHUibBTqN84ag8xxEwbfBTQ/132",
      checked: true,
      bd: "绑定成功",
      userid:"unknow",
      scorest:null,
    }
  },
  methods: {
     userlogin() {
       var that = this
       var objs
       console.log("enter login")
       wx.getSetting({
        success(res) {
          if (res.authSetting["scope.userInfo"]) {
            wx.getUserInfo({
              success(res)
               {
                console.log("method", res.userInfo);
                objs=res.userInfo;
                objs=JSON.stringify(res.userInfo);
                objs=JSON.parse(objs)
                // this.statue = res.userInfo;
                that.uploaddata(objs);
                 console.log("watch: ", objs);
              }
            })
          }console.log("objs: ", objs);
        }
      });
      console.log("objs: ", objs);
      return objs
    },
    uploaddata(res){
      this.statue=res
      this.globalData.statue=res
      console.log("glostatue",this.globalData.statue)
      console.log("upload",this.statue)
    },
    ionChange(e) {
      this.checked = !this.checked;
      this.$emit('change', this.checked);
    },
    getscorehistory(){
      var userid=this.userid
      const that=this
      console.log("user get",userid)
      wx.request({
        url: 'http://127.0.0.1:8000/api/v1/scores/scorelist',
        // method:GET,
        data: {
          student_id: userid,
        },
        header: {
          'content-type': 'application/json' // 默认值
        },
        success(res) {
          console.log("getscorehistory", res.data)
          that.uploadscorehistory(res.data)
        }
      })
    },
    uploadscorehistory(res){
      this.scorest=res
      console.log('scorest',this.scorest)
    }
  },
  created() {

    // this.statue = false;
    // let self = this;

  },
  onLoad() {
  },
  onShow() {
    this.userid=this.globalData.userInfo.userid
    this.globalData.statue=null
    this.getscorehistory()
  },
   mounted() {
    // sta=this.userlogin()
    console.log('globaldatatts',this.globalData.userInfo)
    this.userlogin() 
    const self = this;
    // console.log("watch1: ", box);
    console.log("watch box statue: ", this.statue);
    // /api/v1/getuser
    wx.request({
      url: 'http://127.0.0.1:8000/api/v1/tests', //仅为示例，并非真实的接口地址
      // method:GET,
      header: {
        'content-type': 'application/json' // 默认值
      },  
      success(res) {
        self.uploaddata(res.data)
        console.log(res.data)
      }
    })
    // console.log("get userlogin",typeof(that),that)
    // console.log("mounted+userlogin", this.userlogin())
    // this.statue = sta
    // console.log("mounted", sta)
  },
}
</script>

<style>
.cell-panel-demo {
  display: block;
  margin-top: 15px;
}
</style>
