$(document).ready(function () {
    if (window.location.href.includes('index.php/')) {
        window.location.replace(window.location.href.replace('index.php/', ''));
    }
    $("form :input").keypress(function () {
        if($(this).attr('type') != 'date' && $(this).attr('type') != 'time'){
            return mataBlancos(event, $(this));
        }
    });
    $('[href="'+location.href+'"]').parent().addClass('active');
});

function solonumero(event) {

    if (event.keyCode < 48 || event.keyCode > 57) {
        event.returnValue = false;
    }
}

function getSiteURL() {
    var seg = location.href.split('/');
    var href = "";
    seg.pop();
    for (let i = 0; i < seg.length; i++) {
        if (i == 0) {
            seg[0] = seg[0] + "//";
        } else {
            if (i > 1) {
                seg[i] = seg[i] + '/';
            }
        }
        href += seg[i];
    }

    return href;
}

function replaceAll(str, find, replace) {
    return str.replace(new RegExp(find, 'g'), replace);
}

function mataBlancos(e, element) {
    if ($.trim(element.val()) == '') {
        console.log(element.val());
        if (e.which === 32 && e.target.selectionStart === 0) {
            return false;
        }
        element.val('');
        element.val(element.val().slice(0, -1));
    }
}