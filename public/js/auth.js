var Auth = function () {
    var r = function () {
        var e = $(".login-form");
        e.validate({
            errorElement: "span",
            errorClass: "help-block",
            focusInvalid: !1,
            rules: {username: {required: !0}, password: {required: !0}, remember: {required: !1}},
            messages: {username: {required: "Username is required."}, password: {required: "Password is required."}},
            invalidHandler: function (r, e) {
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
                Core.toLogin(e.serialize());
            }
        }), $(".login-form input").keypress(function (r) {
            if (13 == r.which)return $(".login-form").validate().form() && $(".login-form").submit(), !1
        })
    };
    var gb = function () {
        return $(".login-bg");
    };
    var ib = function () {
        gb().backstretch([Core.assetsDiff("assets/pages/img/login/bg1.jpg"), Core.assetsDiff("assets/pages/img/login/bg2.jpg"), Core.assetsDiff("assets/pages/img/login/bg3.jpg")], {
            fade: 1e3,
            duration: 8e3
        })
    };
    var db = function () {
        gb().backstretch('destroy');
    };
    return {
        init: function () {
            r(), ib()

        },
        reloadBs: function () {
            db(), ib()
        }
    }
}();
