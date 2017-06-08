<template>
    <div class="user-login-5" >
        <div class="row bs-reset">
            <div class="col-md-6 bs-reset mt-login-5-bsfix">
                <div class="login-bg" :style="{ backgroundImage: 'url(' + assetsDiff('/assets/pages/img/login/bg1.jpg') + ')' }"></div>
            </div>
            <img class="login-logo" src="img/logo.png"/>
            <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
                <div class="login-content">
                    <h1>Login</h1>
                    <p> Lorem ipsum dolor sit amet, coectetuer adipiscing elit sed diam nonummy et nibh euismod aliquam
                        erat volutpat. Lorem ipsum dolor sit amet, coectetuer adipiscing. </p>
                    <form action="#" class="login-form">
                        <div v-html="csrfField"></div>
                        <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        <span>Enter any username and password. </span>
                    </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <input class="form-control form-control-solid placeholder-no-fix form-group" type="text"
                                       autocomplete="off" placeholder="Username" name="username" required/></div>
                            <div class="col-xs-6">
                                <input class="form-control form-control-solid placeholder-no-fix form-group"
                                       type="password" autocomplete="off" placeholder="Password" name="password"
                                       required/></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 text-right">
                                <button class="btn green mt-ladda-btn ladda-button" data-style="slide-down" type="submit">
                                    <span class="ladda-label">Sign In</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="row bs-reset">
                        <div class="col-xs-5 bs-reset">
                            <ul class="login-social">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-social-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-social-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-social-dribbble"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-7 bs-reset">
                            <div class="login-copyright text-right">
                                <p>Copyright &copy; {{ config.app.name }} 2017</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                backstretchImages: [
                    this.assetsDiff('/assets/pages/img/login/bg1.jpg'),
                    this.assetsDiff('/assets/pages/img/login/bg2.jpg'),
                    this.assetsDiff('/assets/pages/img/login/bg3.jpg')
                ],
                loginPerforming: false
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
                    highlight (r) {
                        $(r).closest(".form-group").addClass("has-error")
                    },
                    success (r) {
                        r.closest(".form-group").removeClass("has-error"), r.remove()
                    },
                    errorPlacement (r, e) {
                        r.insertAfter(e.closest(".input-icon"))
                    },
                    submitHandler: (r) => {
                        this.userLogin(e.serialize())
                    }
            });

                $(".login-form input").keypress(function (r) {
                    if (13 == r.which)return $(".login-form").validate().form() && $(".login-form").submit(), !1
                })

            },
            backstretchInit () {
                $(".login-bg").backstretch(this.backstretchImages, {
                    fade: 1e3,
                    duration: 8e3
                })
            },
            userLogin (postData) {
                if(this.loginPerforming)
                    return false;

                this.loginPerforming = true;

                let l = Ladda.create(document.querySelector( 'button[type="submit"]' ));
                l.start();

                axios.post('/auth/login', postData)
                    .then(response => {
                        if(response.data.user){
                            this.$emit('update:userData', response.data.user);
                        }

                        this.showToast(response.data.toast);
                        this.loginPerforming = false;
                        l.stop();
                    })
                    .catch(error => {
                        console.log(error);
                        this.loginPerforming = false;
                        l.stop();
                    });
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