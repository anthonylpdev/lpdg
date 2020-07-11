<template>
    <thead>
        <tr>
            <th v-if="isSelectable"><input type="checkbox" :checked="isSelected"></th>
            <th v-for="header in headers">{{ header }}</th>
        </tr>
    </thead>
</template>

<script>
    export default {
        props: ['headers', 'isSelectable', 'allSelected'],
        data: function() {
            return {
                isSelected: false
            }
        }
    };
</script>

<style lang="scss" scoped>
    @import '@sass/_variables.scss';
    @import '@sass/_mixins.scss';
    tr {
        border-bottom: 1.5px solid #DFE0EB;
        height: 70px;
        th {
            &:nth-child(2), &:last-child {
                text-align: left;
            }
            &:first-child {
                display: flex;
                justify-content: center;
                height: 100%;
                align-items: center;
            }
        }
    }
    thead {
        tr {
            height: 30px;
            font-style: normal;
            font-weight: bold;
            font-size: 14px;
            line-height: 18px;
            letter-spacing: 0.2px;
            color: $gray-default;
            th {
                vertical-align: top;
                &:first-child {
                    align-items: flex-start;
                    input {
                        &[type="checkbox"] {
                            margin: 0;
                        }
                    }
                }
            }
        }
    }
</style>
