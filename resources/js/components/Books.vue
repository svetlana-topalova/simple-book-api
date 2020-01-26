<template>
<div v-if="!hasRecords" style="text-align: center"><br><br>LOADING DATA...</div>
<div v-else>

    <b-table show-empty :items="items" :fields="fields" :current-page="currentPage" :per-page="0">
        <!-- A custom formatted column -->
        <template v-slot:cell(cover)="{ value }">
            <img v-if="value" :src="value" alt="image">
        </template>
    </b-table>
    <b-pagination :total-rows="totalItems" :per-page="perPage" v-model="currentPage" @input="fetchData" />

</div>
</template>

<script>
import BookService from '../services/book.service';

export default {

    data() {
        return {
            items: [],
            fields: [{
                    key: 'cover',
                    label: 'Cover'
                },
                {
                    key: 'title',
                    label: 'Title'
                },
                {
                    key: 'author.name',
                    label: 'Author'
                },
                {
                    key: 'description',
                    label: 'Description'
                },
                {
                    key: 'published_at',
                    label: 'Published'
                }
            ],
            currentPage: 1,
            perPage: 15,
            totalItems: 100,
            pageCount: 3,
        }
    },
    computed: {
        hasRecords() {
            return this.items.length > 0;
        },
        totalRows() {
            return this.items.length;
        }
    },
    mounted() {
        this.fetchData()
    },

    methods: {

        fetchData() {
            BookService.getBooks(this.currentPage).then(
                response => {
                    this.items = response.data.data;
                    this.totalItems = response.data.meta.total;
                    this.pageCount = response.data.meta.last_page;
                },
                error => {
                    console.log("Error: " + error.response.data)
                }
            );

        },

    }

}
</script>

<style scoped>
img {
    height: 2rem;
}
</style>
