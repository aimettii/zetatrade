<template>
    <div style="height: 100%;">
        <global-loader v-if="globalLoader"></global-loader>
        <main-page
                v-if="userData"
                :user-data.sync="userData"
        ></main-page>
        <auth-page
                v-if="!userData"
                :user-data.sync="userData"
        ></auth-page>
    </div>
</template>

<script>
    import GlobalLoader from './widgets/loaders/Global.vue'
    import AuthPage from './pages/Auth.vue'
    import MainPage from './pages/Main.vue'

    export default {

        mounted () {

            Pace.on('done', () => {
                setTimeout(() => {
                    this.globalLoader = false
                })
            });

            this.getUserData();
        },

        data () {
            return {
                userData: false,
                globalLoader: true
            }
        },

        components: {
            GlobalLoader,
            AuthPage,
            MainPage
        },

        methods: {
            getUserData () {
                axios.get('/user/get-data')
                    .then(response => this.userData = response.data.user)
                    .catch(error => console.log(error));
            }
        }

    }
</script>