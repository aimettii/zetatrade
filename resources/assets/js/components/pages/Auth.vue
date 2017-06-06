<script>
    export default {
        data () {
            return {
                backstretchImages: [
                    this.assetsDiff('/assets/pages/img/login/bg1.jpg'),
                    this.assetsDiff('/assets/pages/img/login/bg2.jpg'),
                    this.assetsDiff('/assets/pages/img/login/bg3.jpg')
                ]
            }
        },
        methods: {
            validateInit () {
                let e = $(".login-form");
                e.validate({
                    errorElement: "span",
                    errorClass: "help-block",
                    focusInvalid: !1,
                    rules: {username: {required: !0}, password: {required: !0}, remember: {required: !1}},
                    messages: {username: {required: "Username is required."}, password: {required: "Password is required."}},
                    invalidHandler (r, e) {
                        $(".alert-danger", $(".login-form")).show()
                    },
                    highlight: function (r) {
                        $(r).closest(".form-group").addClass("has-error")
                    },
                    success: function (r) {
                        r.closest(".form-group").removeClass("has-error"), r.remove()
                    },
                    errorPlacement: function (r, e) {
                        r.insertAfter(e.closest(".input-icon"))
                    },
                    submitHandler: function (r) {
                        alert('Login Bitch')
                    }
                });
                $(".login-form input").keypress(function (r) {
                    if (13 == r.which)return $(".login-form").validate().form() && $(".login-form").submit(), !1
                })
            },
            backstretchInit() {
                $(".login-bg").backstretch(this.backstretchImages, {
                    fade: 1e3,
                    duration: 8e3
                })
            }
        },
        mounted () {
            this.validateInit();
            this.backstretchInit();
        }
    }
</script>

<style>
    .user-login-5 .login-logo {
        position: absolute;
        right: 5.3em;
        top: 1.5em;
        left: initial;
    }

    .user-login-5 {
        background-color: #fff;
    }
</style>