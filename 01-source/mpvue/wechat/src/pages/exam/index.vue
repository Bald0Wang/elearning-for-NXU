<template>
<div>
<i-panel class="cell-panel-demo">
<i-cell-group>
    <i-cell title="2019年全国硕士研究生入学统一考试思想政治理论试题"  url="/pages/select1/index">
     <i-icon type="brush" color="#57ceab" size="30" slot="icon" />
    </i-cell>

    <i-cell title="2018年全国硕士研究生入学统一考试思想政治理论试题"  url="/pages/happy/index">
     <i-icon type="brush" color="#57ceab" size="30" slot="icon" />
    </i-cell>

    <i-cell title="2017年全国硕士研究生入学统一考试思想政治理论试题"  url="/pages/happy/index">
     <i-icon type="brush" color="#57ceab" size="30" slot="icon" />
    </i-cell>

    <i-cell title="2016年全国硕士研究生入学统一考试思想政治理论试题"  url="/pages/happy/index">
     <i-icon type="brush" color="#57ceab" size="30" slot="icon" />
    </i-cell>

    <i-cell title="2015年全国硕士研究生入学统一考试思想政治理论试题"  url="/pages/happy/index">
     <i-icon type="brush" color="#57ceab" size="30" slot="icon" />
    </i-cell>

     <i-cell title="2014年全国硕士研究生入学统一考试思想政治理论试题"  url="/pages/happy/index">
     <i-icon type="brush" color="#57ceab" size="30" slot="icon" />
    </i-cell>

     <i-cell title="2013年全国硕士研究生入学统一考试思想政治理论试题"  url="/pages/happy/index">
     <i-icon type="brush" color="#57ceab" size="30" slot="icon" />
    </i-cell>

     <i-cell title="2012年全国硕士研究生入学统一考试思想政治理论试题"  url="/pages/happy/index">
     <i-icon type="brush" color="#57ceab" size="30" slot="icon" />
    </i-cell>

     <i-cell title="2011年全国硕士研究生入学统一考试思想政治理论试题"  url="/pages/happy/index">
     <i-icon type="brush" color="#57ceab" size="30" slot="icon" />
    </i-cell>

     <i-cell title="2010年全国硕士研究生入学统一考试思想政治理论试题"  url="/pages/happy/index">
     <i-icon type="brush" color="#57ceab" size="30" slot="icon" />
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
