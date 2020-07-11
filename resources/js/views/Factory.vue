<template>
    <div class="content">
        <Table
            :isSelectable="false"
            :items="items"
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
                        'Produit',
                        'Date',
                        'Nombre total d’article',
                    ],
                    rows: [
                        {
                            'id': 10,
                            'name': 'Eclair au chocolat',
                            'date': 1625417400,
                            'articles': 4,
                        },
                        {
                            'id': 11,
                            'name': 'Eclair au chocolat',
                            'date': 1625417400,
                            'articles': 2,
                        },
                        {
                            'id': 12,
                            'name': 'Eclair au chocolat',
                            'date': 1625417400,
                            'articles': 1,
                        },
                        {
                            'id': 13,
                            'name': 'Eclair au chocolat',
                            'date': 1625417400,
                            'articles': 4,
                        },
                        {
                            'id': 14,
                            'name': 'Eclair au chocolat',
                            'date': 1625417400,
                            'articles': 3,
                        },
                    ],
                },
            };
        },
    };
</script>

<style scoped>

</style>
