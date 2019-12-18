<template>
<div>
<i-panel class="cell-panel-demo">
 <i-cell-group>
       
   <i-cell title="大学类" is-link value="四六级、考研" url="/pages/select1/main">
   <i-icon type="time_fill" color="#57ceab" size="25" slot="icon" />
   </i-cell>
   <i-cell title="教师类" is-link value="教师资格" url="/pages/index/index">
   <i-icon type="emoji_fill" color="#57ceab" size="25" slot="icon" />
   </i-cell>
   <i-cell title="工程类" is-link value="建造师" url="/pages/index/index">
   <i-icon type="accessory" color="#57ceab" size="25" slot="icon" />
   </i-cell> 
   <i-cell title="公考类" is-link value="国考、省考" url="/pages/index/index">
   <i-icon type="service_fill" color="#57ceab" size="25" slot="icon" />
   </i-cell>    
  </i-cell-group>
</i-panel>
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
