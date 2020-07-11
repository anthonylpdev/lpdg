<template>
    <header class="header">
        <h1>Titre</h1>
        <a class="user-part" href="#">
            <span class="name">Jones Ferdinand</span>
            <img alt="Jones Ferdinand" class="avatar" src="@assets/avatar.png" title="Jones Ferdinand"/>
        </a>
    </header>
</template>

<script>
    export default {};
</script>

<style lang="scss" scoped>
    @import '@sass/_variables.scss';
    .header {
        display: flex;
        justify-content: space-between;
        h1 {
            font-style: normal;
            font-weight: bold;
            font-size: 24px;
            line-height: 30px;
            letter-spacing: 0.3px;
            color: $gray-black;
        }
        .user-part {
            text-decoration: none;
            display: flex;
            .name {
                font-style: normal;
                font-weight: 600;
                font-size: 14px;
                line-height: 44px;
                text-align: right;
                letter-spacing: 0.2px;
                color: $gray-black;
                padding-right: 14px;
            }
            .avatar {
                display: block;
                object-fit: cover;
                height: 40px;
                width: 40px;
                border: 2px solid #363740;
                border-radius: 50%;
            }
        }
    }
</style>
