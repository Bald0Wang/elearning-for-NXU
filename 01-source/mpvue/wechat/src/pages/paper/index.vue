<template>
<div>
  <i-panel class="cell-panel-demo">
    <i-cell-group>
      <i-cell title="2019年全国硕士研究生入学统一考试思想政治理论试题" url="/pages/select1/index">
        <i-icon type="brush" color="#57ceab" size="30" slot="icon" />
      </i-cell>
    </i-cell-group>
  </i-panel>

  <i-panel v-for="(item,index) in arr" :key='index' :title="item">
    <i-checkbox-group current="{{current[index]}}" @change="handleFruitChange">
      <i-checkbox wx:for="{{fruit[index]}}" position="{{position}}" disabled="{{disabled}}" checked="{{checked}}" wx:key="{{item.id}}" value="{{item.name}}">
      </i-checkbox>
    </i-checkbox-group>
  </i-panel>
  <!-- <i-button @click="handleDisabled" type="ghost">切换复选框位置</i-button>
  <div>
    <i-panel title="checkbox-动物">
      <i-checkbox value="{{animal}}" disabled="{{disabled}}" checked="{{checked}}" @change="handleAnimalChange">
      </i-checkbox>
    </i-panel> -->
  <i-button @click="handleDisabled" type="ghost">完成试卷</i-button>
  <i-button @click="bindViewTap" type="primary">提交试卷</i-button>
  <!-- <i-button @click="getcurrent" type="ghost">切换disabled状态</i-button> -->
</div>
</template>

<script>
export default {
  data() {
    return {
      arr: [],
      fruit1: [
        [{
          id: 1,
          name: '香蕉',
        }, {
          id: 2,
          name: '苹果'
        }, {
          id: 3,
          name: '西瓜'
        }, {
          id: 4,
          name: '葡萄',
        }]
      ],
      fruit: [],
      current: [],
      position: 'right',
      animal: '熊猫',
      checked: false,
      disabled: false,
      spid: null,
      ans:null,
      userans:null,
    }
  },
  methods: {
    getpapaersubjcts() {
      wx.request({
        url: 'http://127.0.0.1:8000/api/v1/student_paper_mns',
        // method:GET,
        data: {
          paperid: this.globalData.userInfo.userid,
        },
        header: {
          'content-type': 'application/json' // 默认值
        },
        success(res) {
          console.log("spid", res.data.spid)
          // that.uploaduser(res.data)
        }
      })
    },
    uplodauserpapaer() {
      var that = this;
      // 将全局变量 this.globalData.subtype，
      //this.globalData.subtype1,this.globalData.userInfo.userid
      //关联起来  然后返回后台的student_paper表……  
      //然后传入最后提交在改一下score表  这样就对了！
      wx.request({
        url: 'http://127.0.0.1:8000/api/v1/papers/subjects',
        // method:GET,
        data: {
          paperid: this.globalData.lockpaperid,
        },
        header: {
          'content-type': 'application/json' // 默认值
        },
        success(res) {
          // console.log("subid", res.data.subid)
          that.getpapaersubjctsp(res.data.subid)
          // that.uploaduser(res.data)
        }
      })


    },
    bindViewTap() {
      var userans=this.userans
      var acc=0;
      for(var i=0;i<this.ans.length;i++){
        if(this.ans[i]==userans[i]){acc++}        
      }
      console.log('acc',acc/(this.ans.length)*100)
      this.globalData.score=acc/(this.ans.length)*100
      const url = '../score/main'
      mpvue.navigateTo({url})
      this.disabled = false;
      this.current = [];
      // 上传试卷函数
      this.UploadScores();
    },
    UploadScores(){
      let score=this.globalData.score
      let paper_id=this.globalData.lockpaperid
      // 本页试卷id
      let student_id=this.globalData.userInfo.userid

      wx.request({
        url: 'http://127.0.0.1:8000/api/v1/scores',
        // method:GET,
        data: {
          score: score,
          paper_id:paper_id,
          student_id:student_id,
        },
        header: {
          'content-type': 'application/json' // 默认值
        },
        success(res) {
          console.log("upload of paper", res.data)
          // that.uploaduser(res.data)
        }
      })
    },
    handleFruitChange(e) {
      const get_index_str = e.mp.currentTarget.dataset.eventid
      // const get_index = get_index_str.substr(get_index_str.length - 1, 1)
      // console.log("get_index_str",get_index_str.substr(get_index_str.length - 2, 2))
      var get_index = get_index_str.substr(get_index_str.length - 1, 1)
      get_index = get_index_str.length===4?get_index_str.substr(get_index_str.length - 2, 2):get_index;
      console.log("get_index",get_index)
      if (this.current.indexOf(get_index) === -1) {
        this.current.push([])
      }
      const index = this.current[get_index].indexOf(e.mp.detail.value);
      //  console.log('current',get_index)
      index === -1 ? this.current[get_index].push(e.mp.detail.value) : this.current[get_index].splice(index, 1);
      // splice 删除下标为index 长度为1 的
      // console.log('current1',this.current[get_index])
    },
    handleClick() {
      this.position = this.position.indexOf('left') !== -1 ? 'right' : 'left'
      // this.setData({
      //     position: this.data.position.indexOf('left') !== -1 ? 'right' : 'left',
      // });
    },
    handleDisabled() {
      this.disabled = !this.disabled
      var userans=[]
      for(let i=0;i<this.ans.length;i++){
        userans.push('')
      }
      for(let i=0;i<this.ans.length;i++){
        if(this.current[i]){
          if(this.current[i].length){
            var ansstring=''
            for(let j=0;j<this.current[i].length;j++){
              ansstring+=this.current[i][j].substr(0,1);
            }
            var newansstring=""
            if(ansstring.search("A")){newansstring+='A'}
            else if(ansstring.search("B")){newansstring+='B'}
            else if(ansstring.search("C")){newansstring+='C'}
            else if(ansstring.search("D")){newansstring+='D'}
            // userans[i]=newansstring
            userans[i]=ansstring
            }
        }
        // for(let j=0;j<this.current[i].length;j++){
        //   userans[i].push(this.current[i][j]);
        // }
      }
      this.userans=userans;
      console.log(this.current);
      console.log("userans",this.userans);
    },
    handleAnimalChange(e) {
      // this.setData({
      //     checked: detail.current
      // });
      this.checked = e.mp.detail.current
      console.log(this.checked)
    },
    ionChange(e) {
      this.checked = !this.checked;
      this.$emit('change', this.checked);
    },
    getpapaersubjctsp(res) {
      this.spid = res
      var arrs = [];
      var anslist = [];
      var rightans = [];
      for (var i = 0; i < res.length; i++) {
        arrs.push(res[i].id + '.' + res[i].ask);
        anslist.push(
          [{
            id: 1,
            name: "A."+res[i].askansA,
          }, {
            id: 2,
            name: "B."+res[i].askansB
          }, {
            id: 3,
            name: "C."+res[i].askansC
          }, {
            id: 4,
            name: "D."+res[i].askansD,
          }]
        )
        rightans.push(res[i].ans)
      }
      this.arr = arrs;
      this.fruit=anslist
      this.ans=rightans
      // console.log('anslist', anslist)
      // console.log('arr', this.arr)
      console.log('ans',this.ans)
      // console.log('spid',this.spid)
    }
  },
  onShow() {
    var subcod = this.globalData.subtype * 10 + this.globalData.subtype1
    console.log('subcode', subcod)
    this.globalData.lockpaperid = 1
    // fun1 用户选择试卷接口
    this.uplodauserpapaer();
    //fun2 试卷试题以及答案获取接口
    this.getpapaersubjcts();
    // 导入试卷 同时上传用户数据  
    this.globalData.score=0;
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
