setTimeout(function () {
    var list = document.getElementById("specSections").getElementsByTagName("li");
    for (var i = 0; i < list.length; i++) {
        list[i].style.cssText = "opacity:1; margin-left:15px; transition:1.5s; transition-delay:1." + i + "s";
    }
    var listSec = document.getElementById("specSectionsSec").getElementsByTagName("li");
    for (var j = 0; j < listSec.length; j++) {
        listSec[j].style.cssText = "opacity:1; margin-bottom:30px; transition:1.5s; transition-delay:1." + j + "s";
    }
    var slashes = document.getElementById("specSections").getElementsByTagName("i");
    for (var i = 0; i < slashes.length; i++) {
        slashes[i].style.cssText = "text-shadow: 1px 1px 2px white, 0 0 25px green, 0 0 5px green; transition:1.5s; transition-delay:2." + i + "s";
    }

}, 1000);


function showBot() {
        var buttomList = document.getElementById("bottomBlock").getElementsByTagName("li");
        for (var i = 0; i < buttomList.length; i++) {
            buttomList[i].style.cssText = "opacity:1; transition:1s; transition-delay:0." + i + "s";
        }
}

function hideBot() {
    setTimeout(function () {
        var buttomList = document.getElementById("bottomBlock").getElementsByTagName("li");
        for (var i = 0; i < buttomList.length; i++) {
            buttomList[i].style.cssText = "opacity:0; transition:1s; transition-delay:2." + i + "s";
        }
    },5000);
}

function sumProducts(elem,price,id){
    document.getElementById('#'+'goodCount'+id).innerHTML = elem.value*price+"$";
    document.getElementById('gcount').value = document.getElementById('good-count').value;
}

setTimeout(function () {
    document.getElementById('SeccuessMessage').style.cssText="opacity:0; transition:3s; margin-left:100px; transition-delay:3s";
    setTimeout(function () {
        document.getElementById('SeccuessMessage').style.display='none';
    }, 8100);
}, 5000);

