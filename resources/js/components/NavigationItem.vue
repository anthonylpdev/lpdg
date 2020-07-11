<template>
    <li>
        <router-link
            :class="{'is-active': isRoute(link)}"
            :to="link"
            class="link"
            preserve-scroll>
            <span :class="'icon icon-' + icon"></span>
            {{ label }}
        </router-link>
    </li>
</template>

<script>
    export default {
        props: ['icon', 'label', 'link'],
        methods: {
            isRoute(name) {
                if (name === '/') {
                    return 'home' === this.$route.name;
                }
                return name === this.$route.name;
            },
        },
    };
</script>

<style lang="scss" scoped>
    @import '@sass/_variables.scss';
    .link {
        display: flex;
        padding: 18px 24px;
        text-decoration: none;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 20px;
        letter-spacing: 0.2px;
        color: #A4A6B3;
        &.is-active {
            position: relative;
            background-color: #3E4049;
            color: #DDE2FF;
            &:before {
                content: '';
                position: absolute;
                width: 3px;
                height: 56px;
                background-color: #DDE2FF;
                left: 0;
                top: 0;
            }
            .icon {
                &:before {
                    color: #DDE2FF;
                }
            }
        }
        > * {
            line-height: 20px;
        }
        .icon {
            display: block;
            margin-right: 25px;
            text-align: left;
            width: 16px;
            height: 20px;
            &:before {
                color: #60626E;
            }
        }
    }
</style>
