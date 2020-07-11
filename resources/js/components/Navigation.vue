<template>
    <aside class="aside">
        <div class="head-part">
            <span class="logo">L</span>
            <span class="title">LPDG</span>
        </div>
        <nav class="menu-part">
            <ul class="list-link">
                <NavigationItem
                    :icon="item.icon"
                    :key="index"
                    :label="item.label"
                    :link="item.link"
                    v-for="(item, index)  in menuItems">
                </NavigationItem>
            </ul>
        </nav>
    </aside>
</template>

<script>
    import NavigationItem from './NavigationItem';

    export default {
        components: {
            NavigationItem,
        },
        data() {
            return {
                menuItems: [
                    {
                        'label': 'Accueil',
                        'icon': 'home',
                        'link': '/',
                    },
                    {
                        'label': 'Commande',
                        'icon': 'articles',
                        'link': 'order',
                    },
                    {
                        'label': 'Fabrication',
                        'icon': 'factory',
                        'link': 'factory',
                    },
                    {
                        'label': 'Article',
                        'icon': 'product',
                        'link': 'item',
                    },
                    {
                        'label': 'Utilisateur',
                        'icon': 'agents',
                        'link': 'user',
                    },
                    {
                        'label': 'Réglage',
                        'icon': 'a_1-settings',
                        'link': 'setting',
                    },
                ],
            };
        },
    };
</script>

<style lang="scss" scoped>
    @import '@sass/_variables.scss';
    .aside {
        width: 255px;
        height: 100vh;
        padding-top: 37px;
        background-color: #363740;
        .head-part {
            margin-bottom: 59px;
            padding-left: 24px;
            display: flex;
            .logo {
                display: block;
                text-align: center;
                line-height: 32px;
                margin-right: 12px;
                color: #ffffff;
                background-color: $color-default;
                height: 32px;
                width: 32px;
                border-radius: 50%;
            }
            .title {
                font-weight: bold;
                font-size: 19px;
                line-height: 32px;
                letter-spacing: 0.4px;
                color: #A4A6B3;
                opacity: 0.7;
            }
        }
        .menu-part {
            .list-link {
                list-style: none;
                display: flex;
                flex-direction: column;
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
            }
        }
    }
</style>
