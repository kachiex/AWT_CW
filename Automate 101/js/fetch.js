var xmlhttp;

function fetch(t)
{
    // note - this doesn't work in IE browsers - surprised?

    // supports most of the browsers
    try {
        xmlhttp = new XMLHttpRequest();
    }
    catch (e) {
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); // for internet explorer
        }
        catch (e) {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    // now build the URL of the server-side resource we want to
    // communicate with
    //xmlhttp.async = false;
    var url = "/AWTWeb/index.php/dict/lookup?t=" + t;
    xmlhttp.onreadystatechange = myfunc;
    xmlhttp.open("GET", url);
    xmlhttp.send();
}

function myfunc()
{
    if (xmlhttp != null && xmlhttp.readyState == 4) {
        var txt = xmlhttp.responseText;
        document.getElementById('mydiv').innerHTML = txt;
    }
}