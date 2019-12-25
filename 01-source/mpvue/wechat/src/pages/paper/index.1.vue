<template>
<div>
  <i-panel class="cell-panel-demo">
    <i-cell-group>
      <i-cell title="2019年全国硕士研究生入学统一考试思想政治理论试题" url="/pages/select1/index">
        <i-icon type="brush" color="#57ceab" size="30" slot="icon" />
      </i-cell>
    </i-cell-group>
  </i-panel>
  
  <i-panel title="group-水果">
    <i-checkbox-group current="{{current}}" @change="handleFruitChange">
      <i-checkbox wx:for="{{fruit}}" position="{{position}}" wx:key="{{item.id}}" value="{{item.name}}">
      </i-checkbox>
    </i-checkbox-group>
  </i-panel>

  <i-button @click="handleClick" type="ghost">切换复选框位置</i-button>

  <i-panel title="checkbox-动物">
    <i-checkbox value="{{animal}}" disabled="{{disabled}}" checked="{{checked}}" @change="handleAnimalChange">
    </i-checkbox>
  </i-panel>

  <i-button @click="handleDisabled" type="ghost">切换disabled状态</i-button>
</div>
</template>

<script>
export default {
  data() {
    return {
      fruit: [{
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
        }],
        current: ['苹果', '葡萄'],
        position: 'left',
        animal: '熊猫',
        checked: false,
        disabled: false,
    }
  },
  methods: {
      handleFruitChange(e) {
        const index = this.current.indexOf(e.mp.detail.value);
        index === -1 ? this.current.push(e.mp.detail.value) : this.current.splice(index, 1);
        this.current=this.current
    },
    handleClick() {
      this.position=this.position.indexOf('left') !== -1 ? 'right' : 'left'
        // this.setData({
        //     position: this.data.position.indexOf('left') !== -1 ? 'right' : 'left',
        // });
    },
    handleDisabled() {
        this.disabled=!this.disabled
    },
    handleAnimalChange(e) {
        // this.setData({
        //     checked: detail.current
        // });
        this.checked=e.mp.detail.current
        console.log(this.checked)
    },
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
