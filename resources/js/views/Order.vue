<template>
    <div class="content">
        <Table
            :status="status"
            :isSelectable="true"
            itemSlug="orders"
            :headers="headers"
        ></Table>
    </div>
</template>

<script>
    import Table from '../components/Table';

    export default {
        props: {
            status: {
                type: String,
                default: 'published'
            },
        },
        components: {
            Table
        },
        data: function() {
            return {
                headers: [
                    'Client',
                    'Paiement',
                    'Articles',
                    'Date de livraison',
                ],
                items: [
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
            };
        },
        mounted() {
            console.log('Order mounted.');
            console.log(this.status);
        }
    }
</script>
