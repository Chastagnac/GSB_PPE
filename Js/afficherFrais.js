var getHttpRequest = function () {
    var httpRequest = false;

    if (window.XMLHttpRequest) { // Mozilla, Safari, IE7+...
        httpRequest = new XMLHttpRequest();
        if (httpRequest.overrideMimeType) {
            httpRequest.overrideMimeType('text/xml');
        }
    } else if (window.ActiveXObject) { // IE 6 et antérieurs
        try {
            httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {

            try {
                httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
            }
        }
    }
    if (!httpRequest) {
        alert('Abandon');
        return false;
    }
    return httpRequest;

}

var links = document.querySelectorAll('.form-group');

for (var i = 0; i < links.length; i++) {
    var link = links[i];
    link.addEventListener('click', function (e) {
        e.preventDefault();
        var httpRequest = getHttpRequest();
        httpRequest.onreadystatechange = function () {
            if (httpRequest.readyState === 4) {
                document.getElementById('result').innerHTML = httpRequest.responseText;
            }
        };

        httpRequest.open('GET', this.getAttribute('href'), true);
        httpRequest.send();
    });
}
