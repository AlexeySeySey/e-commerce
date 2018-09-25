window.onscroll = function() {
    document.getElementById('admin-navbar-sticky').style.cssText = "position:fixed; z-index:200 !important; bottom:495px !important; height:70px !important";
}

$(document).ready(function() {
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {

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

            reader.onload = function(e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });
});

addEventListener("load", function() {
    setTimeout(hideURLbar, 0);
}, false);

function hideURLbar() {
    window.scrollTo(0, 1);
}

function rightNavBarAdmin() {
    if (document.getElementById('navbar-category-admin-icon').getAttribute('class') == 'fa fa-window-minimize') {
        document.getElementById('sidebar-text-category-first').style.cssText = "visibility:hidden";
        document.getElementById('navbar-admin').style.cssText = "width:50px !important; transition:0.5s";

        document.getElementById('main-content-admin-first').style.cssText = "width:1200px !important; margin-left:50px !important; transition:0.5s;";

        document.getElementById('navbar-category-admin-icon').setAttribute('class', 'fa fa-navicon');
        var elements = document.getElementsByClassName("sidebar-text-category");
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.cssText = "visibility:hidden";
        }

    } else {
        document.getElementById('main-content-admin-first').style.cssText = "width:1100px !important; margin-left:200px !important; transition:0.5s;";

        document.getElementById('navbar-admin').style.cssText = "width:200px !important; transition:0.5s";
        document.getElementById('sidebar-text-category-first').style.cssText = "visibility:visible";
        document.getElementById('navbar-category-admin-icon').setAttribute('class', 'fa fa-window-minimize');
        var elements = document.getElementsByClassName("sidebar-text-category");
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.cssText = "visibility:visible";
        }
    }
}


function adminIconCat(num) {
    if (document.getElementById('navbar-category-admin-icon').getAttribute('class') == 'fa fa-window-minimize') {
        var sections = document.getElementsByClassName('admin-panel-categires-list-all');
        for (var i = 0; i < sections.length; i++) {
            if (num == i) {
                document.getElementById('categ-admin-elem' + i).style.cssText = "z-index:60; margin-left:50px !important; opacity:1; transition:0.2s;";
                document.getElementById('sidecat' + i).style.cssText = "margin-right:50px !important; transform: scale(1.5); opacity:1; transition: 0.35s ease;";
                document.getElementById('sidecat' + i).setAttribute('class', 'bg-secondary');
                break
            }
        }
    }
}

function adminIconCatOut() {
    var sections = document.getElementsByClassName('admin-panel-categires-list-all');
    for (var i = 0; i < sections.length; i++) {
        document.getElementById('categ-admin-elem' + i).style.cssText = "z-index:60; margin-right:50px !important; transition:0.2s;";
        document.getElementById('sidecat' + i).style.cssText = "transform: scale(1); opacity:0.7; transition: 0.35s ease; z-index:1";
    }
}

function usersShowUp() {
    document.getElementById('allUsersTable').style.cssText = "visibility:visible !important";
}

function usersHide() {
    document.getElementById('allUsersTable').style.cssText = "display:none";
}

function Ban(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/admin/banUser',
        cache: false,
        type: 'POST',
        data: { user_id: id },
        success: function() {
            document.getElementById('#' + 'ban-return-text' + id).style.cssText = "visibility:visible !important";
            document.getElementById('#' + 'banbutton' + id).style.cssText = "visibility:hidden !important";
        },
        error: function(ts) {
            alert(ts.responseText)
        }
    });
}

function UnBan(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/admin/unbanUser',
        cache: false,
        type: 'POST',
        data: { user_id: id },
        success: function() {
            document.getElementById('#' + 'unban-return-text' + id).style.cssText = "visibility:visible !important";
            document.getElementById('#' + 'unbanbutton' + id).style.cssText = "visibility:hidden !important";
        },
        error: function(ts) {
            alert(ts.responseText)
        }
    });
}


function hideCategorie(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/admin/softDeleteCategorie',
        cache: false,
        type: 'POST',
        data: { categorie_id: id },
        success: function() {
            $('#AdmCatAll' + id).css('opacity', '0.7');
            $('#hideadmincat' + id).css('display', 'none');
            $('#changeadmincat' + id).css('display', 'none');
        },
        error: function(ts) {
            alert(ts.responseText)
        }
    });
}

function dropCategorie(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/admin/realDeleteCategorie',
        cache: false,
        type: 'POST',
        data: { categorie_id: id },
        success: function() {
            $('#AdmCatAll' + id).css('opacity', '0.7');
            $('#dropadmincat' + id).css('display', 'none');
            $('#aliveadmincat' + id).css('display', 'none');
        },
        error: function(ts) {
            alert(ts.responseText)
        }
    });
}

function restoreCategorie(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/admin/restoreCategorie',
        cache: false,
        type: 'POST',
        data: { categorie_id: id },
        success: function() {
            $('#AdmCatAll' + id).css({
                'background-color': 'mediumspringgreen',
                'transition': '1s'
            });
            $('#dropadmincat' + id).css('display', 'none');
            $('#aliveadmincat' + id).css('display', 'none');
        },
        error: function(ts) {
            alert(ts.responseText)
        }
    });
}

function unfill() {
    var inputs = $('#followers-checkList-new :input');
    inputs.attr("checked", !inputs.attr("checked"));
}








