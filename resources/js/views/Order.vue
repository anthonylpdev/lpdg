<template>
    <div class="content">
        <Table
            :isSelectable="true"
            :items="items"
            :filters="filters"
            :navigation="navigation"
            :status="status"
        ></Table>
    </div>
</template>

<script>
    import Table from '../components/Table';

    export default {
        components: {
            Table
        },
        data: function() {
            return {
                items: {
                    headers: [
                        'Client',
                        'Paiement',
                        'Articles',
                        'Date de livraison',
                    ],
                    rows: [
                        {
                            'id': 10,
                            'name': 'Camille Giraud',
                            'payed': true,
                            'articles': 4,
                            'date': 1625417400,
                        },
                        {
                            'id': 11,
                            'name': 'Elsa Vidal',
                            'payed': false,
                            'articles': 2,
                            'date': 1625417400,
                        },
                        {
                            'id': 12,
                            'name': 'Naomi Giraud',
                            'payed': true,
                            'articles': 1,
                            'date': 1625417400,
                        },
                        {
                            'id': 13,
                            'name': 'Rafael Marie',
                            'payed': true,
                            'articles': 4,
                            'date': 1625417400,
                        },
                        {
                            'id': 14,
                            'name': 'Elouan Guillaume',
                            'payed': true,
                            'articles': 3,
                            'date': 1625417400,
                        },
                        {
                            'id': 15,
                            'name': 'Camille Giraud',
                            'payed': true,
                            'articles': 4,
                            'date': 1625417400,
                        },
                        {
                            'id': 16,
                            'name': 'Elouan Guillaume',
                            'payed': true,
                            'articles': 3,
                            'date': 1625417400,
                        },
                        {
                            'id': 17,
                            'name': 'Camille Giraud',
                            'payed': true,
                            'articles': 4,
                            'date': 1625417400,
                        },
                    ],
                },
                filters: {
                    'published': 'Publiées',
                    'archived': 'Archivées',
                    'trashed': 'Corbeille',
                },
                navigation: {
                    perPage: 8,
                    perPageList: [8, 16],
                    page: 1,
                    firstItemNumber: 1,
                    lastItemNumber: 8,
                    totalItems: 300,
                    previousPageUrl: '#prev',
                    nextPageUrl: '#next',
                },
            };
        },
        props: {
            status : String
        },
        mounted() {
            console.log('Order mounted.')
        },
        beforeRouteUpdate (to, from, next) {
            //console.log(to.params);
            next();
        }
    }
</script>
