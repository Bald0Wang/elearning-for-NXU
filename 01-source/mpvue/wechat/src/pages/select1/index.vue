<template>
<div>
<i-panel class="cell-panel-demo">
 <i-cell-group>
       
    <i-cell title="大学类" >
   <i-icon type="time_fill" color="#57ceab" size="25" slot="icon" />
   </i-cell>
   <i-cell title="英语四级"  ></i-cell>
   <i-cell title="英语六级" ></i-cell> 
   <i-cell title="考研数学一" ></i-cell>
   <i-cell title="考研数学二" ></i-cell> 
   <i-cell title="考研政治" ></i-cell>  
  </i-cell-group>
</i-panel>


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
</style>
