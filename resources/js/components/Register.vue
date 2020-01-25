<template>
<div class="column is-4 is-offset-4">
    <div class="box">
        <h1 class="title">Sign up</h1>
        <div class="alert alert-danger" role="alert" v-if="message">{{message}}</div>

        <b-form @submit.prevent="register">
            <b-form-group id="input-group-name" label="Name:" label-for="input-name">
                <b-form-input id="input-name" v-model="name" required placeholder="Enter name"></b-form-input>
                <div v-if="errors.name" class="alert alert-danger">
                    {{errors.name[0]}}
                </div>
            </b-form-group>
            <b-form-group id="input-group-email" label="Email address:" label-for="input-email">
                <b-form-input id="input-email" v-model="email" type="email" required placeholder="Enter email"></b-form-input>
                <div v-if="errors.email" class="alert alert-danger">
                    {{errors.email[0]}}
                </div>
            </b-form-group>
            <label for="text-password">Password</label>
            <b-input type="password" v-model="password" placeholder="Password" id="text-password" aria-describedby="password-help-block"></b-input>
            <b-form-text id="password-help-block">
                Your password must be 8-20 characters long, contain letters and numbers, and must not
                contain spaces, special characters, or emoji.
            </b-form-text>
            <div v-if="errors.password" class="alert alert-danger">
                {{errors.password[0]}}
            </div>
            <label for="text-password">Confirm Password</label>
            <b-input type="password" v-model="password_confirmation" placeholder="Password" id="text-password"></b-input>
            <div v-if="errors.password_confirmation" class="alert alert-danger">
                {{errors.password_confirmation[0]}}
            </div>
            <b-form-group id="input-group-role" label="Role:" label-for="input-role">
                <b-form-select v-model="is_author" :options="roleoptions"></b-form-select>
            </b-form-group>
            <b-form-group>
                <b-form-checkbox v-if="!is_author" id="checkbox-subscribe" v-model="subscribe" name="checkbox-subscribe" value="1" unchecked-value="0">
                    I would like to recieve notifications
                </b-form-checkbox>
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
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            is_author: 0,
            roleoptions: [{
                    value: 0,
                    text: 'Reader'
                },
                {
                    value: 1,
                    text: 'Author'
                }
            ],
            subscribe: '1',
            message: '',
            errors: []
        };
    },

    methods: {
        register() {
            let userData = {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
                is_author: this.is_author,
                is_subscribed: !this.is_author ? this.subscribe : 0,
            };


            this.$store.dispatch('auth/register', userData).then(
                data => {
                    this.message = data;
                    this.$router.push('/login');
                },
                error => {
                    this.loading = false;
                    this.message = error.message;
                    this.errors = error;
                }
            );
        }
    }
}
</script>
