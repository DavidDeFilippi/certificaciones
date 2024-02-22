$(document).ready(function () {
    if(window.location.href.includes('index.php/')){
        window.location.replace(window.location.href.replace('index.php/',''));
    }
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