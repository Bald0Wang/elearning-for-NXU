<template >
  <div>
    <img src="@/assets/images/tool-logo.png" alt=" "> 
  </div> 
 
</template>

<script>
import InforCard from '_c/info-card'
import CountTo from '_c/count-to'
import { ChartAny } from "_c/charts"
import { ChartPie, ChartBar } from '_c/charts'
import Example from './example.vue'
export default {
  name: 'home',
  components: {
    InforCard,
    CountTo,
    ChartPie,
    ChartBar,
    Example,
    ChartAny,
  },
  data () {
    return {
      
    }
  },
  methods: {

  }, 
  mounted () {

  }
}
</script>

<style lang="less">
.count-style{
  font-size: 50px;
};
.rgba {
    background-color:FFFFFF;
};
.circle {
    text-align: center
};

</style>
