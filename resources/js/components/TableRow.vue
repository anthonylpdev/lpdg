<template>
    <tbody>
        <tr :key="row.id" v-for="row in rows">
            <td v-if="isSelectable"><input type="checkbox" :checked="isSelected || allSelected"></td>
            <td v-for="(value, type) in row" v-if="type !== 'id'">{{ value }}</td>
        </tr>
    </tbody>
</template>

<script>
    export default {
        props: ['rows', 'isSelectable', 'allSelected'],
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
    .table-body {
        flex-grow: 1;
        table {
            height: 100%;
            width: 100%;
            text-align: center;
            tr {
                border-bottom: 1.5px solid #DFE0EB;
                height: 70px;
                td {
                    &.statut {
                        color: $red-default;
                        position: relative;
                        padding-left: 14px;
                        &:before {
                            content: '';
                            position: absolute;
                            height: 6px;
                            width: 6px;
                            border-radius: 50%;
                            background-color: $red-default;
                            top: 50%;
                            margin-top: -3px;
                            left: 0;
                        }
                        &.available {
                            color: $green-default;
                            &:before {
                                background-color: $green-default;
                            }
                        }
                    }
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
                &.is-checked {
                    input {
                        &[type="checkbox"] {
                            background-color: $color-default;
                            border-color: $color-default;
                        }
                    }
                }
            }
            tbody {
                font-style: normal;
                font-weight: normal;
                font-size: 14px;
                line-height: 20px;
                text-align: center;
                letter-spacing: 0.3px;
                color: #4B506D;
                tr {
                    td {
                        vertical-align: middle;
                        &:nth-child(2) {
                            font-style: normal;
                            font-weight: 600;
                            font-size: 16px;
                            line-height: 22px;
                            letter-spacing: 0.3px;
                            color: $gray-black;
                        }
                    }
                }
            }
        }
    }
</style>
