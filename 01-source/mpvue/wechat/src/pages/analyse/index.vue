<template>
<div>
  

   <i-row>
    <i-col >
      <i-card full title="限时答题日" extra="马上参与>>" thumb="https://i.loli.net/2017/08/21/599a521472424.jpg">
          <view slot="content">参与2020年考研各科答题活动，检测水平，根据答题成绩给出对应题目，提高成绩，指日可待！</view>
          
      </i-card>
    </i-col>
  </i-row>
  <i-row>
    <i-col >
      <i-card full title="用户名" extra="lyj3444855" thumb="https://i.loli.net/2017/08/21/599a521472424.jpg">
          <view slot="content">英语水平等级LV2基础，数学水平等级：LV4中级，政治水平等级LV8高级，建议多学习英语，继续加油吧1...</view>
      </i-card>
    </i-col>
  </i-row>
    <i-row>
        <i-col>
         <i-grid>
            <i-grid-item>
           <i-icon size="24"  type="time_fill" /> 你努力了120天
        </i-grid-item>
        <i-grid-item>
          <i-icon size="24" type="mail_fill" /> 总共做题200道
        </i-grid-item>
         </i-grid>
        </i-col>

         <i-col>
         <i-grid> <i-grid-item>
          
           <i-icon size="24" type="success_fill" />平均正确率60%
        </i-grid-item>
        <i-grid-item>
          <i-icon size="24" type="emoji_fill" />超过30%的同学
        </i-grid-item>
         </i-grid>
        </i-col>
    </i-row>

    <Row>
        <Col span="24">
          <img  src="/static/images/analyse1.png" style="width:100%;height:120px;" />
        </Col>
      </Row>

      <Row>
        <Col span="24">
          <img  src="/static/images/analyse2.png" style="width:100%;height:120px;" />
        </Col>
      </Row>
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
