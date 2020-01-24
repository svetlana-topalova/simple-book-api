class BookService {


    getBooks(currentPage) {
        return axios.get(`/api/books?page=${currentPage}`);
    }

    publishBook(data) {
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');
        return axios.post('/api/book/publish', data)
    }

}

export default new BookService();
