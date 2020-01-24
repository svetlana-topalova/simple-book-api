class AuthService {
    login(data) {
        return axios
            .post('/api/login', data)
            .then(this.handleResponse)
            .then(response => {
                if (response.data.access_token) {
                    console.log(response.data.access_token)
                    localStorage.setItem('token', response.data.access_token);
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + response.data.access_token;
                }
                return response.data;
            });
    }

    logout() {
        let token = localStorage.getItem('token');
        console.log('token');
        console.log(token);
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;

        return new Promise((resolve, reject) => {
            axios.post('/api/logout')
                .then(response => {
                    //console.log(response)
                    localStorage.removeItem('token')
                    localStorage.removeItem('user')

                })
                .catch(error => {
                    //console.log(error)
                    localStorage.removeItem('token')
                    localStorage.removeItem('user')

                })
        });

    }

    getUser() {

        return axios.get('/api/user')
            .then(this.handleResponse)
            .then(({
                data
            }) => {
                console.log(data)
                localStorage.setItem('user', JSON.stringify(data));
                return data
            })
            .catch(error => {
                this.error = error.response.data;
                if (error.status === 401) {
                    this.logout();
                }
            });
    }

    register(data) {
        return axios.post('/api/register', data);
    }

    handleResponse(response) {
        if (response.status === 401) {
            this.logout();
            location.reload(true);

            const error = response.data && response.data.message;
            return Promise.reject(error);
        }

        return Promise.resolve(response);
    }
}

export default new AuthService();
