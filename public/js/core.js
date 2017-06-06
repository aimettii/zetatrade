var Core = new Vue({
    el: '#core',
    data: {
        user: false,
        loader: true,
        init: true
    },
    methods: {
        userLogout: function () {
            $.get('auth/logout', function(data){
                Core.setUser(false);
                Core.showToast(data.toast);
            })
        },
        toLogin: function(data) {
            $.post('auth/login', data)
                .done( function( data ) {
                    if(data.status == 'success'){
                        Core.setUser(data.user);
                    }
                    Core.showToast(data.toast);
                });
        },
        getAuth: function() {
            $.get('user/get-data', function(data){
                Core.setUser(data.user);
            })
        },
        setUser: function(val) {
            Core.user = val;
        },
        showToast: function(data) {
            toastr[data.type](data.text, data.title);
        },
        hasPrivilege: function(p) {
            if(typeof Core != 'undefined' && Core.user && Core.user.privileges[p]){
                return true;
            }else{
                return false;
            }
        },
        assetsDiff: assetsDiff
    },
});

jQuery(document).ready(function () {

    Core.getAuth();

    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-right",
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
});




