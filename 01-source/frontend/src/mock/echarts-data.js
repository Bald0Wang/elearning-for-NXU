import Mock from 'mockjs'
import { doCustomTimes } from '@/libs/util'
const Random = Mock.Random

//耗材使用情况统计
export const option_consumable = {
    xAxis: {
        type: 'category',
        data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
    },
    yAxis: {
        type: 'value'
    },
    series: [{
        data: [820, 932, 901, 934, 1290, 1330, 1320],
        type: 'bar'
    }]
}

//工具使用情况统计
export const option_tools = {
    xAxis: {
        type: 'category',
        data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
    },
    yAxis: [
        {
            type: 'value'
        },
        {
            type: 'value'
        }
    ],
    series: [
        {
            data: [120, 200, 150, 80, 70, 110, 130],
            type: 'bar'
        },
        {
            data: [120, 200, 150, 80, 70, 110, 130],
            type: 'bar',
            yAxisIndex: 1
        },
    ]
}