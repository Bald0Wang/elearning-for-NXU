<template>
<div>
<i-grid>

    <i-row>
        <i-grid-item>
            <i-grid-icon>
                <i-icon size="24" type="activity" color="#57ceab" />
                <i-grid-label>章节</i-grid-label>
            </i-grid-icon>
        </i-grid-item>
        <i-grid-item>
            <i-grid-icon>
                <i-icon size="24" type="addressbook" color="#57ceab" />
                <i-grid-label>真题</i-grid-label>
            </i-grid-icon>
        </i-grid-item>
    </i-row>


    <i-row>
        <i-grid-item>
            <i-grid-icon>
                <i-icon size="24" type="collection" color="#57ceab" />
                <i-grid-label>收藏</i-grid-label>
            </i-grid-icon>
        </i-grid-item>
        <i-grid-item>
            <i-grid-icon>
                <i-icon size="24" type="computer" color="#57ceab"/>
                <i-grid-label>错题</i-grid-label>
            </i-grid-icon>
        </i-grid-item>
       
    </i-row>
  


</i-grid>
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
