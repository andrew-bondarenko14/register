<template>
    <div>
        <form v-on:submit.prevent="onSubmit">
            <input type="text" placeholder="Имя" v-model="name">
            <input type="text" placeholder="Фамилия" v-model="surname">
            <input type="text" placeholder="Отчество" v-model="patronymic">
            <input type="text" placeholder="Логин" v-model="login">
            <input type="email" placeholder="Email" v-model="email">
            <input type="text" placeholder="Номер телефона" v-model="phone">
            <input type="password" placeholder="Пароль" v-model="password">
            <input type="password" placeholder="Повторите пароль" v-model="passwordConfirmation">
            <button class="btn">Регистрация</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Register",
        props: ['app'],
        data() {
            return {
                name: '',
                surname: '',
                patronymic: '',
                login: '',
                email: '',
                phone: '',
                password: '',
                passwordConfirmation: '',
                errors: []
            }
        },
        methods: {
            onSubmit() {
                this.errors = [];
                if (!this.errors.length) {
                    const data = {
                        name: this.name,
                        surname: this.surname,
                        patronymic: this.patronymic,
                        login: this.login,
                        email: this.email,
                        phone: this.phone,
                        password: this.password
                    };
                    this.app.req.post('api/register', data).then(response => {
                        this.app.user = response.data;
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