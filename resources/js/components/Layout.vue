<template>
    <div class="global">
        <Navigation></Navigation>
        <div class="right-part">
            <Header></Header>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import Navigation from './Navigation';
    import Header from './Header';

    export default {
        mounted() {
            console.log('Layout mounted');
        },
        components: {
            Navigation,
            Header,
        },
    };
</script>

<style lang="scss" scoped>
    @import '@sass/_variables.scss';
    .global {
        display: flex;
        height: 100vh;
        .right-part {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            padding: 30px;
            overflow: auto;
        }
    }
</style>
