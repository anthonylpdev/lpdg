<template>
    <nav class="status-menu">
        <ul class="list">
            <li class="item"
                :class="{'is-active': currentNavigation.status === slug}"
                :key="slug"
                v-for="(label, slug) in filtersToDisplay">
                <router-link
                    @click="click(slug)"
                    :class="{'is-active': false}"
                    :to="'/order?status=' + slug"
                    class="link"
                    preserve-scroll>
                    {{ label }}
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        props: ['filtersToDisplay', 'currentNavigation'],
        methods: {
            click: function($slug){
                this.$emit('filter-click', $slug);
            }
        },
        watch: {
            currentNavigation: function(newNavigation) {
                this.currentNavigation = newNavigation
            }
        }
    };
</script>

<style lang="scss" scoped>
    @import '@sass/_variables.scss';

    .status-menu {
        .list {
            display: flex;
            .item {
                .link {
                    text-decoration: none;
                    font-style: normal;
                    font-size: 14px;
                    line-height: 18px;
                    letter-spacing: 0.2px;
                    color: $gray-light;
                }
                &.is-active {
                    .link {
                        color: $color-default;
                        font-weight: bold;
                    }
                }
                &:not(:first-child) {
                    position: relative;
                    padding-left: 8px;
                    margin-left: 8px;
                    &:before {
                        content: '|';
                        color: $gray-light;
                        position: absolute;
                        left: -3px;
                        top: 0;
                    }
                }
            }
        }
    }
</style>
