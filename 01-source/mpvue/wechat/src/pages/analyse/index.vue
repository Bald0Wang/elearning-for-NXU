<template>
<div>
  <i-row>
    <i-col>
      <i-card full title="限时答题日" extra="马上参与>>" >
        <view slot="content">参与2020年考研各科答题活动，检测水平，根据答题成绩给出对应题目，提高成绩，指日可待！</view>

      </i-card>
    </i-col>
  </i-row>
  <i-row>
    <i-col>
      <i-card full title="用户名" :extra="statue.nickName" :thumb="statue.avatarUrl">
        <view slot="content">英语水平等级LV2基础，数学水平等级：LV4中级，政治水平等级LV8高级，建议多学习英语，继续加油吧1...</view>
      </i-card>
    </i-col>
  </i-row>
   <i-row>
    <i-col>
      <i-grid>
        <i-grid-item>
          <i-icon size="24" type="time_fill" /> 你努力了120天
        </i-grid-item>
        <i-grid-item>
          <i-icon size="24" type="mail_fill" /> 总共做题200道
        </i-grid-item>
      </i-grid>
    </i-col>
    <i-col>
      <i-grid>
        <i-grid-item>

          <i-icon size="24" type="success_fill" />平均正确率60%
        </i-grid-item>
        <i-grid-item>
          <i-icon size="24" type="emoji_fill" />超过30%的同学
        </i-grid-item>
      </i-grid>
    </i-col>
  </i-row>
  <!--折线图-->
  <i-row>
    <i-col span="24">
      <i-row>
        <i-col span="24" class="container">
          <ec-canvas class="canvas" id="mychart-dom-bar" canvas-id="mychart-bar" :ec="ec"></ec-canvas>
          <p style="size=18; text-align:center">所有同学的考研答题情况折线分布</p>
        </i-col>
      </i-row>
    </i-col>
  </i-row>
  <!--饼图-->
  <i-row>
    <i-col span="24">
      <i-row>
        <i-col span="24" class="container">
          <ec-canvas class="canvas" id="mychart-dom-bar" canvas-id="mychart-bar" :ec="pie"></ec-canvas>
           <p style="size=18; text-align:center">所有同学的考研答题情况饼状分布</p>
        </i-col>
      </i-row>
    </i-col>
  </i-row>
</div>
</template>

<script>
const options = {
  // more code ... 

  tooltip: {
    trigger: 'axis',
    axisPointer: {
      type: 'cross',
      label: {
        backgroundColor: '#6a7985'
      }
    }
  },
  legend: {
    data: ['考研数学', '考研英语', '考研政治']
  },
  toolbox: {
    feature: {
      saveAsImage: {}
    }
  },
  grid: {
    left: '3%',
    right: '4%',
    bottom: '3%',
    containLabel: true
  },
  xAxis: [{
    type: 'category',
    boundaryGap: false,
    data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
  }],
  yAxis: [{
    type: 'value'
  }],
  series: [{
      name: '考研数学',
      type: 'line',
      stack: '总量',
      areaStyle: {},
      data: [120, 132, 101, 134, 90, 230, 210]
    },
    {
      name: '考研英语',
      type: 'line',
      stack: '总量',
      areaStyle: {},
      data: [220, 182, 191, 234, 290, 330, 310]
    },
    {
      name: '考研政治',
      type: 'line',
      stack: '总量',
      areaStyle: {},
      data: [150, 232, 201, 154, 190, 330, 410]
    },


  ]
}
const optionPie = {
  tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: ['考研英语','考研政治','考研数学']
    },
    series : [
        {
            name: '课程分类',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:[
                {value:335, name:'考研英语'},
                {value:310, name:'考研政治'},
                {value:234, name:'考研数学'},
               
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
}

export default {
  data() {
    return {
      statue:null,
      ec: {
        // 传 options
        options: options,
      },

      pie: {
        options: optionPie,
      },
      checked: true,

    }
  },
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

  },
  methods: {
    ionChange(e) {
      this.checked = !this.checked;
      this.$emit('change', this.checked);
    }
  },
  onShow(){
   
  },
  mounted() {
    console.log('statue',this.globalData.statue)
    this.statue=this.globalData.statue
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

ec-canvas {
  margin-top: -80px;
  width: 350px;
  height: 300px;
}
</style>
