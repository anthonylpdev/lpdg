<template>
    <div class="table-container">
        <nav class="status-menu">
            <ul class="list">
                <li class="item"
                    :class="{'is-active': status === slug}"
                    :key="slug"
                    v-for="(label, slug) in filters">
                    <router-link
                        :to="`/order/${slug}`"
                        class="link">
                        {{ label }}
                    </router-link>
                </li>
            </ul>
        </nav>
        <div class="table-inner">
            <div class="table-header">
                <h2>Toutes les commandes</h2>
                <div class="right-part" v-if="isSelectable">
                    <form action="#" class="search">
                        <input class="search" placeholder="Rechercher" type="text">
                    </form>
                    <div class="select-container">
                        <select class="actions" id="actions" name="actions">
                            <option disabled selected value="">Actions</option>
                            <option value="delete">Supprimer</option>
                            <option value="edit">Editer</option>
                        </select>
                        <span class="icon icon-dropdown-up"></span>
                    </div>
                    <a class="btn" href="#">Ajouter</a>
                </div>
            </div>
            <div class="table-body">
                <table>
                    <thead>
                    <tr>
                        <th v-if="isSelectable">
                            <input
                                type="checkbox"
                                class="icon-radio"
                                @change="selectAll"
                                :value="allSelected"
                                v-model="allSelected">
                        </th>
                        <th v-for="header in headers">{{ header }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr :key="item.id" v-for="item in items">
                        <td v-if="isSelectable">
                            <input
                                type="checkbox"
                                class="icon-radio"
                                @change="select"
                                :value="item.id"
                                v-model="userIds"></td>
                        <td
                            v-for="(value, type) in item"
                            v-if="type !== 'id'">{{ value }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-footer">
                <div class="select-part">
                    <span>Lignes par page :</span>
                    <select
                        class="pagination"
                        id="pagination"
                        name="pagination">
                        <option
                            v-for="nb in perPageList"
                            :selected="nb.toString() === navigation.perPage"
                            :value="nb">{{ nb }}
                        </option>
                    </select>
                    <span class="icon icon-dropdown-up"></span>
                </div>
                <span class="display-part">{{ navigation.firstItemNumber }}-{{ navigation.lastItemNumber }} sur {{ navigation.totalItems }}</span>
                <div class="arrows-part">
                    <router-link
                        class="icon icon-arrow---top prev"
                        :class="{'is-disabled': navigation.previousPageUrl === '#'}"
                        :to="navigation.previousPageUrl">
                    </router-link>
                    <router-link
                        class="icon icon-arrow---top next"
                        :class="{'is-disabled': navigation.nextPageUrl === '#'}"
                        :to="navigation.nextPageUrl"
                    ></router-link>
                </div>
            </div>
        </div>
        <!--<p class="no-content" v-else>Aucun contenu...</p>-->
    </div>
</template>

<script>
    import MenuFilter from './MenuFilter';
    import axios from 'axios';

    export default {
        props: {
            isSelectable: Boolean,
            itemSlug: String,
            headers: Array,
            status: {
                type: String,
                default: 'published'
            },
        },
        components: {MenuFilter},
        methods: {
            selectAll: function() {
                this.userIds = [];
                if (this.allSelected) {
                    for (let item in this.rows) {
                        const currentItem = this.rows[item];
                        this.userIds.push(currentItem.id);
                    }
                }
            },
            select: function() {
                this.allSelected = false;
            },
            fetchData: function() {
                axios.get(window.location.origin + '/api/' + this.itemSlug, {
                    params: {
                        perPage: this.navigation.perPage,
                        page: this.navigation.page,
                        status: this.status,
                    }
                }).then((result) => {
                    console.log(result);
                    this.items = result.data.items;
                    this.navigation = result.data.navigation;
                });
            },
        },
        data: function() {
            return {
                selected: [],
                allSelected: false,
                userIds: [],
                filters: {
                    'published': 'Publiées',
                    'archived': 'Archivées',
                    'trashed': 'Corbeille',
                },
                perPageList: [8, 16],
                navigation: {
                    perPage: 8,
                    page: 1,
                    firstItemNumber: 1,
                    lastItemNumber: 8,
                    totalItems: 300,
                    previousPageUrl: '#prev',
                    nextPageUrl: '#next',
                },
                items: [],
            };
        },
        mounted() {
            this.fetchData({});
        },
    };
</script>

<style lang="scss" scoped>
    @import '@sass/_variables.scss';
    @import '@sass/_mixins.scss';
    .table-container {
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
        .table-inner {
            margin-top: 16px;
            background-color: #fff;
            border: #DFE0EB 1px solid;
            border-radius: 5px;
            padding-top: 27px;
            .table-header {
                display: flex;
                justify-content: space-between;
                margin-bottom: 38px;
                .right-part {
                    display: flex;
                    justify-content: flex-end;
                    padding-right: 34px;
                    form.search {
                        position: relative;
                        &:before {
                            display: block;
                            position: absolute;
                            left: 26px;
                            top: 12px;
                            @include font-icon();
                            content: "\E921";
                            color: $gray-default;
                            font-size: 16px;
                            text-align: center;
                            line-height: 18px;
                        }
                        input {
                            &.search {
                                display: block;
                                width: 331px;
                                line-height: 36px;
                                padding-left: 56px;
                                background: #FCFDFE;
                                border: 1px solid #F0F1F7;
                                box-sizing: border-box;
                                border-radius: 8px;
                                &::placeholder {
                                    font-style: normal;
                                    font-weight: normal;
                                    font-size: 14px;
                                    letter-spacing: 0.3px;
                                    color: #B5B8C4;
                                }
                            }
                        }
                    }
                    .select-container {
                        position: relative;
                        select.actions {
                            width: 140px;
                            height: 40px;
                            margin-left: 34px;
                            padding-left: 24px;
                            border: 1px solid $gray-light;
                            box-sizing: border-box;
                            border-radius: 8px;
                            background-color: transparent;
                            font-style: normal;
                            font-weight: 600;
                            font-size: 14px;
                            line-height: 20px;
                            letter-spacing: 0.2px;
                            color: $gray-default;
                        }
                        .icon {
                            display: block;
                            position: absolute;
                            top: 12px;
                            right: 24px;
                            pointer-events: none;
                            color: $gray-default;
                            -webkit-transform: rotate(180deg);
                            -moz-transform: rotate(180deg);
                            -ms-transform: rotate(180deg);
                            -o-transform: rotate(180deg);
                            transform: rotate(180deg);
                        }
                    }
                    a.btn {
                        margin-left: 48px;
                    }
                }
            }
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
                                    content: "";
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
                        }
                        th, td {
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
            .table-footer {
                display: flex;
                justify-content: flex-end;
                height: 24px;
                padding: 24px 32px;
                font-style: normal;
                font-weight: normal;
                font-size: 14px;
                line-height: 20px;
                letter-spacing: 0.3px;
                color: $gray-default;
                .select-part {
                    display: flex;
                    justify-content: flex-end;
                    margin-right: 40px;
                    select.pagination {
                        border: none;
                        background-color: transparent;
                        font-style: normal;
                        font-weight: normal;
                        font-size: 14px;
                        line-height: 20px;
                        text-align: right;
                        letter-spacing: 0.3px;
                        color: #4B506D;
                        padding-left: 8px;
                        padding-right: 12px;
                    }
                    .icon {
                        display: block;
                        pointer-events: none;
                        margin-left: -16px;
                        line-height: 24px;
                        -webkit-transform: rotate(180deg);
                        -moz-transform: rotate(180deg);
                        -ms-transform: rotate(180deg);
                        -o-transform: rotate(180deg);
                        transform: rotate(180deg);
                    }
                }
                .display-part {
                    margin-right: 24px;
                }
                .arrows-part {
                    display: flex;
                    a {
                        display: block;
                        height: 24px;
                        width: 24px;
                        text-decoration: none;
                        color: $gray-default;
                        -webkit-transform: rotate(-90deg);
                        -moz-transform: rotate(-90deg);
                        -ms-transform: rotate(-90deg);
                        -o-transform: rotate(-90deg);
                        transform: rotate(-90deg);
                        &:before {
                            display: block;
                            height: 24px;
                            width: 24px;
                            font-size: 18px;
                            text-align: center;
                        }
                        &.next {
                            -webkit-transform: rotate(90deg);
                            -moz-transform: rotate(90deg);
                            -ms-transform: rotate(90deg);
                            -o-transform: rotate(90deg);
                            transform: rotate(90deg);
                        }
                        &.is-disabled {
                            cursor: not-allowed;
                            opacity: 0.2;
                            pointer-events: none;
                        }
                    }
                }
            }
        }
    }
    .no-content {
        margin-top: 30px;
        padding-left: 32px;
    }
</style>
