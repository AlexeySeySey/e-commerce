$(document).ready(function () {
    $(document).on('change', '.btn-file :file', function () {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function (event, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {
        readURL(this);
    });
});

addEventListener("load", function () {
    setTimeout(hideURLbar, 0);
}, false);

function hideURLbar() {
    window.scrollTo(0, 1);
}

function rightNavBarAdmin() {
    if (document.getElementById('navbar-category-admin-icon').getAttribute('class') == 'fa fa-window-minimize') {
        document.getElementById('sidebar-text-category-first').style.cssText = "visibility:hidden";
        document.getElementById('navbar-admin').style.cssText = "width:50px !important; transition:0.5s";
        document.getElementById('navbar-category-admin-icon').setAttribute('class', 'fa fa-navicon');
        var elements = document.getElementsByClassName("sidebar-text-category");
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.cssText = "visibility:hidden";
        }

    } else {

        document.getElementById('navbar-admin').style.cssText = "width:200px !important; transition:0.5s";
        document.getElementById('sidebar-text-category-first').style.cssText = "visibility:visible";
        document.getElementById('navbar-category-admin-icon').setAttribute('class', 'fa fa-window-minimize');
        var elements = document.getElementsByClassName("sidebar-text-category");
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.cssText = "visibility:visible";
        }
    }
}

function adminIconCat(id) {
    if (document.getElementById('navbar-category-admin-icon').getAttribute('class') == 'fa fa-window-minimize') {
        document.getElementById('#' + 'categ-admin-elem' + id).style.cssText = "z-index:60; margin-left:50px !important; opacity:1; transition:0.2s;";
        document.getElementById('#' + 'sidecat' + id).style.cssText = "margin-right:50px !important; transform: scale(1.5); opacity:1; transition: 0.35s ease;";
        document.getElementById('#' + 'sidecat' + id).setAttribute('class', 'bg-secondary');

    }
}

function adminIconCatOut(id) {

    document.getElementById('#' + 'categ-admin-elem' + id).style.cssText = "z-index:60; margin-right:50px !important; transition:0.2s;";
    document.getElementById('#' + 'sidecat' + id).style.cssText = "transform: scale(1); opacity:0.7; transition: 0.35s ease; z-index:1";

}

function usersShowUp() {
    document.getElementById('allUsersTable').style.cssText = "visibility: visible;";
}

function usersHide() {
    document.getElementById('allUsersTable').style.cssText = "visibility: hidden !important;";
}

function Ban(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/banUser',
        cache: false,
        type: 'POST',
        success: function (data) {
            document.getElementById('#' + 'banbutton' + id).innerHTML = data;
        },
        error: function (ts) {
            alert(ts.responseText)
        }
    });
}

function UnBan(id){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/unbanUser',
        cache: false,
        type: 'POST',
        success: function (data) {
            document.getElementById('#' + 'banbutton' + id).innerHTML = data;
        },
        error: function (ts) {
            alert(ts.responseText)
        }
    });
}
