<template>
<div class="column is-4 is-offset-4">
    <div class="box">
        <h1 class="title">Login</h1>
        <div class="alert alert-danger" role="alert" v-if="message">{{message}}</div>

        <b-form @submit.prevent="login">
            <b-form-group id="input-group-email" label="Email address:" label-for="input-email">
                <b-form-input id="input-email" v-model="username" type="email" required placeholder="Enter email"></b-form-input>
            </b-form-group>
            <b-form-group id="input-group-password" label="Password:" label-for="input-password">
                <b-input id="input-password" type="password" v-model="password" aria-describedby="password-help-block"></b-input>
            </b-form-group>
            <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>

    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            username: '',
            password: '',
            message: ''
        };
    },

    methods: {
        login() {
            let data = {
                username: this.username,
                password: this.password
            };

            this.$store.dispatch('auth/login', data).then(
                () => {
                    this.$store.dispatch('auth/user').then(
                        () => {
                            this.$router.push('/');
                        },
                        error => {
                            this.loading = false;
                            this.message = error;
                        }

                    );
                },
                error => {
                    this.loading = false;
                    this.message = error;
                }
            );
        }
    }
}
</script>
