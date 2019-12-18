<template>
<div> 
<i-panel class="cell-panel-demo">
  <i-cell-group>
    <i-cell title="马克思主义基本原理概论" label="0/100道" url="/pages/happy/index">
     <i-icon type="createtask" color="#57ceab" size="30" slot="icon" />
    </i-cell>

    <i-cell title="毛泽东思想和中国特色社会主义理论体系概论" label="0/200道" url="/pages/happy/index">
     <i-icon type="createtask" color="#57ceab" size="30" slot="icon" />
    </i-cell>

    <i-cell title="中国近现代史纲要" label="0/150道" url="/pages/happy/index">
     <i-icon type="createtask" color="#57ceab" size="30" slot="icon" />
    </i-cell>

    <i-cell title="思想道德修养和法律基础" label="0/175道" url="/pages/happy/index">
     <i-icon type="createtask" color="#57ceab" size="30" slot="icon" />
    </i-cell>

    <i-cell title="形式与政策以及当代世界经济与政治" label="0/155道" url="/pages/happy/index">
     <i-icon type="createtask" color="#57ceab" size="30" slot="icon" />
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
