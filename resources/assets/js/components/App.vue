<script>
    import AuthPage from './pages/Auth.vue'
    import MainPage from './pages/Main.vue'

    export default {

        props: ['attributes'],

        mounted () {

            Pace.on('done', () => {
                setTimeout(() => {
                    this.globalLoader = false
                }, 2000)
            });

            this.getUserData();

            console.log(this.attributes);
        },

        data () {
            return {
                userData: false,
                globalLoader: true
            }
        },

        components: {
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