<template>
    <div>
        <navbar :app="this"></navbar>
        <spinner v-if="loading"></spinner>
        <div v-else-if="initiated">
            <router-view :app="this"></router-view>
        </div>
    </div>
</template>
<script>
    import Navbar from './navbars/Navbar';
    export default {
        name: 'App',
        components: {
            Navbar
        },
        data() {
            return {
                user: null,
                loading: false,
                initiated: false,
                token: document.cookie,
                req: axios.create({
                    baseUrl: BASE_URL
                })
            }
        },
        mounted() {
          this.init();
        },
        methods: {
            init() {
                this.loading = true;
                const data = {
                    token: this.token,
                };

                this.req.post('api/init', data).then(response => {
                    //this.user = document.cookie;
                    console.log(response);
                    this.user = response.data;
                    this.loading = false;
                    this.initiated = true;
                })
                console.log('token');
                console.log(this.token);
            }
        }
    }
</script>