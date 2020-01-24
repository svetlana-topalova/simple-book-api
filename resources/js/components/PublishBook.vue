<template>
<div class="column is-4 is-offset-4">
    <div class="box">
        <h1 class="title">Publish Book</h1>

        <div class="alert alert-danger" role="alert" v-if="error">{{error}}</div>
        <div class="alert alert-primary" role="alert" v-if="message">{{message}}</div>

        <b-form @submit.prevent="publish">
            <b-form-group id="input-group-1" label="Title:" label-for="input-1"  >
                <b-form-input id="input-1" v-model="title" type="text" required placeholder="Enter Book Title:"></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Description:" label-for="input-1"  >
                <b-form-textarea id="input-2" v-model="description" type="text" required placeholder="Enter Book Description:"></b-form-textarea>
            </b-form-group>
            <b-form-group id="input-group-3" label="Book Cover:" label-for="input-1" >
                <b-form-file accept="image/jpeg, image/png, image/jpg" v-model="fileId" placeholder="Choose a file or drop it here..." drop-placeholder="Drop file here..."></b-form-file>
            </b-form-group>
            <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>

    </div>
</div>
</template>

<script>
import BookService from '../services/book.service';

export default {
    data() {
        return {
            title: '',
            description: '',
            fileId: null,
            message: '',
            error: ''
        };
    },

    methods: {
        publish() {
            const fd = new FormData();
            fd.append('title', this.title);
            fd.append('description', this.description);
            if (this.fileId) {
                fd.append('cover', this.fileId);
            }

            BookService.publishBook(fd).then(
                response => {
                    this.message = "Book Published"
                },
                error => {
                    this.error = error
                }
            );
        }
    }
}
</script>
