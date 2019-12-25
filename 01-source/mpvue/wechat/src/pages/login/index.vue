<template>
<div>
  <!-- <i-panel>
    <i-input value="{{ value1 }}" title="用户名" autofocus placeholder="用户名/邮箱/手机号" />
    <i-input value="{{ value1 }}" title="密码" autofocus placeholder="密码登录" />
  </i-panel> -->
  <!-- <i-button bind:click="handleClick" type="success">登录</i-button> -->
  <!-- <i-button @click="loginUser()" type="success">登录</i-button> -->
  <!-- <i-row i-class="demo-row">
    <i-col span="8" i-class="demo-col"><a href="" style="font-size:12px;text-align:center">手机号快速登录</a></i-col>
    <i-col span="8" i-class="demo-col light">&nbsp;</i-col>
    <i-col span="8" i-class="demo-col"><a style="font-size:12px;text-align:center">忘记密码</a></i-col>
  </i-row> -->
  <!-- <open-data type="userAvatarUrl"></open-data> -->
  <!-- <open-data type="userNickName"></open-data> -->
  <!-- 需要使用 button 来授权登录 -->
  <!-- <button wx:if="{{canIUse}}" open-type="getUserInfo" bindgetuserinfo="bindGetUserInfo">授权登录</!-->
  <button v-i="buttonVisible" open-type="getUserInfo" @getuserinfo="bindGetUserInfo" @click="getUserInfoClick">获取权限</button>
  <p>userinfos:{{userinfos.openid}}<br>session_key{{userinfos.session_key}}</p>
  <!-- <view wx:else>请升级微信版本</view> -->
</div>
</template>

<script>
// globalData.userInfo.userInfo
export default {
  data() {
    return {
      canIUse: wx.canIUse('button.open-type.getUserInfo'),
      checked: true,
      userinfos: {},
    }
  },
  methods: {
    getUserInfoClick() {
      var that=this;
      console.log('ppppppppppp', this.userinfos.openid, this.userinfos.session_key)
      wx.request({
        url: 'http://127.0.0.1:8000/api/v1/students',
        // method:GET,
        data: {
          userinfos: this.userinfos.openid,
          session_key: this.userinfos.session_key,
        },
        header: {
          'content-type': 'application/json' // 默认值
        },
        success(res) {
          console.log("studentlogininfo", res.data)
          that.uploaduser(res.data)
        }
      })
    },
    uploaduser(res) {
      this.globalData.userInfo.userid = res.user
      console.log("userid", this.globalData.userInfo.userid)
      // console.log("openid", this.userinfos.session_key)

    },
    uploaddata(res) {
      this.globalData.userInfo = res.data
      this.userinfos = this.globalData.userInfo
      // console.log("openid", this.userinfos.openid)
      // console.log("openid", this.userinfos.session_key)

    },
    wxGetUserInfo(code) {
      const self = this;
      wx.getUserInfo({
        withCredentials: true,
        success(res) {
          let {
            encryptedData,
            userInfo,
            iv
          } = res;
          self.$http.post('api', {
            code,
            encryptedData,
            iv,
          }).then(res => {
            console.log(`后台交互拿回数据:`, res);
            // 获取到后台重写的session数据，可以通过vuex做本地保存
          }).catch(err => {
            console.log(`自动请求api失败 err:`, err);
          })
        },
        fail(err) {
          console.log('自动wx.getUserInfo失败:', err);
          // 显示主动授权的button
          self.buttonVisible = true;
        }
      })
    },
    bindGetUserInfo(e) {

      // console.log('回调事件后触发')
      const self = this;
      if (e.mp.detail.userInfo) {
        console.log('用户按了允许授权按钮', e.mp.detail.userInfo)
        let {
          encryptedData,
          userInfo,
          iv
        } = e.mp.detail;
        self.$http.post(api, {
          // 这里的code就是通过wx.login()获取的
          code: self.code,
          encryptedData,
          iv,
        }).then(res => {
          console.log(`后台交互拿回数据:`, res);
          // 获取到后台重写的session数据，可以通过vuex做本地保存
        }).catch(err => {
          console.log(`api请求出错:`, err);
        })
      } else {
        //用户按了拒绝按钮
        console.log('用户按了拒绝按钮');
      }

    },
    ionChange(e) {
      this.checked = !this.checked;
      this.$emit('change', this.checked);
    }
  },
  created() {
    this.globalData.userInfo = {};
  },
  mounted() {
    this.checked = false;
    const self = this;
    wx.login({
        success(res) {
          if (res.code) {
            self.code = res.code;
            console.log(res.code);
            wx.request({
              url: 'http://127.0.0.1:8000/api/v1/getuser', //仅为示例，并非真实的接口地址
              // method:GET,
              data: {
                code: res.code,
              },
              header: {
                'content-type': 'application/json' // 默认值
              },
              success(res) {
                self.uploaddata(res.data)
                console.log(res.data)
              }
            })
            self.wxGetUserInfo(res.code);
          }
        },
      })
      // 注册校验
}}
</script>

<style>
.cell-panel-demo {
  display: block;
  margin-top: 15px;
}
</style>
