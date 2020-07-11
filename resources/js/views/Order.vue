<template>
    <div class="content">
        <Table
            :isSelectable="true"
            :items="items"
            :filtersToDisplay="filtersToDisplay"
            :currentNavigation="currentNavigation"
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
                    ],
                },
                filtersToDisplay: {
                    'published': 'Publiées',
                    'archived': 'Archivées',
                    'trashed': 'Corbeille',
                },
                currentNavigation: {
                    perPage: 8,
                    page: 1,
                    status: 'published',
                },
            };
        },
        mounted() {
            console.log('Order mounted.')
        }
    }
</script>
