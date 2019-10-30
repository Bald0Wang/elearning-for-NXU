<template>
  <div ref="dom" class="charts chart-value"></div>
</template>

<script>
import echarts from 'echarts'
import tdTheme from './theme.json'
import { getToken } from '@/libs/util'
import { on, off } from '@/libs/tools'
echarts.registerTheme('tdTheme', tdTheme)
export default {
  name: 'ChartValue',
  props: {
    value: Object,
    text: String,
  },
  data () {
    return {
      dom: null
    }
  },
  methods: {
    resize () {
      this.dom.resize()
    }
  },
  mounted () {
    var token = getToken();
    var code = null;
    this.$nextTick(() => {
      this.value.fn(token,code).then(res => {
          let option = res.data;
          this.dom = echarts.init(this.$refs.dom, 'tdTheme')
          this.dom.setOption(option)
          on(window, 'resize', this.resize)          
      }).catch(function(){
          
      });      
    })
  },
  beforeDestroy () {
    off(window, 'resize', this.resize)
  }
}
</script>
