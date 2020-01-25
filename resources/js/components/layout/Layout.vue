<template>
<div id="app">

    <b-navbar toggleable="lg" type="dark" variant="info">
        <b-navbar-brand href="/">Books</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
                <b-link v-if="authenticated && user && author" class="nav-link" to="/publish-book">Publish Book</b-link>
            </b-navbar-nav>

            <!-- Right aligned nav items -->
            <b-navbar-nav class="ml-auto">
                <b-navbar-nav v-if="authenticated && user">
                    <b-nav-item>
                        <b-nav-text>{{ user.name }}</b-nav-text>
                    </b-nav-item>
                    <b-nav-item class="nav-link button is-primary" @click="logOut">Logout</b-nav-item>
                </b-navbar-nav>
                <b-navbar-nav v-else>
                    <b-nav-item>
                        <router-link class="nav-link button is-light" to="/register">Sign up</router-link>
                    </b-nav-item>
                    <b-nav-item>
                        <router-link class="nav-link button is-primary" to="/login">Login</router-link>
                    </b-nav-item>
                </b-navbar-nav>
            </b-navbar-nav>
        </b-collapse>
    </b-navbar>

    <div class="container" style="margin-top: 2rem">
        <router-view></router-view>
    </div>
</div>
</template>

<script>
export default {
    computed: {
        user() {
            return this.$store.state.auth.user;
        },
        author() {
            return this.$store.state.auth.user.is_author;
        },
        authenticated() {
            return this.$store.state.auth.user;
        }
    },
    methods: {
        logOut() {
            this.$store.dispatch('auth/logout');
            this.$router.push('/login');
        }
    }
}
</script>
