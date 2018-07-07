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


function SaleText(id) {
    document.getElementById('#'+'precName'+id).style.cssText="opacity:1 !important; margin-left:3px; transition:0.7s;";
    document.getElementById('#'+'prec'+id).style.cssText="opacity:1 !important; margin-left:6px; color:red; font-weight:bold; transition:1s; transition-delay:0.9s";
}

function HideSaleText(id) {
    document.getElementById('#'+'precName'+id).style.cssText="opacity:0 !important; margin-right:3px; transition:0.7s;";
    document.getElementById('#'+'prec'+id).style.cssText="opacity:0 !important; margin-right:6px; transition:1s;";
}
function catButton(){

    if((document.getElementById('buttonDownCat').getAttribute('class')) == 'fa fa-sort-desc') {
        setTimeout(function () {
            document.getElementById('buttonDownCat').setAttribute('class', 'fa fa-sort-down');

            var list = document.getElementById("collapseExample").getElementsByTagName("li");
            for (var i = 0; i < list.length; i++) {
                list[i].style.cssText = "visibility:visible; transition:0" + i + "s; transition-delay:0." + i + "s";
            }
        }, 300);
    }

    if((document.getElementById('buttonDownCat').getAttribute('class')) == 'fa fa-sort-up') {
        setTimeout(function () {
            document.getElementById('buttonDownCat').setAttribute('class', 'fa fa-sort-down');

            var list = document.getElementById("collapseExample").getElementsByTagName("li");
            for (var i = 0; i < list.length; i++) {
                    list[i].style.cssText = "visibility:visible; transition:0" + i + "s; transition-delay:0." + i + "s";
            }
        }, 300);
    }
        if((document.getElementById('buttonDownCat').getAttribute('class')) == 'fa fa-sort-down'){
            setTimeout(function () {
                document.getElementById('buttonDownCat').setAttribute('class','fa fa-sort-up');
                var list = document.getElementById("collapseExample").getElementsByTagName("li");
                for (var i = 0; i < list.length; i++) {
                    list[i].style.cssText = "visibility:hidden; transition:0.5s; transition-delay:0." + i + "s";
                }
            }, 300);
        }
    }


