<template>
    <div>
        <form v-on:submit.prevent="onSubmit">
            <input type="text" placeholder="Логин" v-model="login">
            <input type="password" placeholder="Пароль" v-model="password">
            <button class="btn">Вход</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Login",
        props: ['app'],
        data() {
            return {
                login: '',
                password: '',
                errors: []
            }
        },
        methods: {
            onSubmit() {
                this.errors = [];
                if (!this.errors.length) {
                    const data = {
                        login: this.login,
                        password: this.password
                    };
                    this.app.req.post('api/login', data).then(response => {
                        this.app.user = response.data;
                        document.cookie = response.data[1];
                        this.$router.push('/');
                    }).catch(error => {
                        this.errors.push(error.response.data.error);
                    });
                }

            }
        }
    }
</script>

<style scoped>

</style>