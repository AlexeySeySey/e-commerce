

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
    }, 5000);
}

function sumProducts(elem, price, id, salePrice) {
    if (salePrice) {
        document.getElementById('#' + 'good-count' + id).innerHTML = Math.round(elem.value * salePrice) + "$";
    } else {
        document.getElementById('#' + 'good-count' + id).innerHTML = Math.round(elem.value * price) + "$";
    }
    document.getElementById('#' + 'getPrice' + id).value = Math.round(salePrice);
}

setTimeout(function () {
    document.getElementById('SeccuessMessage').style.cssText = "opacity:0; transition:3s; margin-left:100px; transition-delay:3s";
    setTimeout(function () {
        document.getElementById('SeccuessMessage').style.display = 'none';
    }, 8100);
}, 5000);


function SaleText(id) {
    document.getElementById('#' + 'precName' + id).style.cssText = "opacity:1 !important; margin-left:3px; transition:0.7s;";
    document.getElementById('#' + 'prec' + id).style.cssText = "opacity:1 !important; margin-left:6px; color:red; font-weight:bold; transition:1s; transition-delay:0.9s";
}

function HideSaleText(id) {
    document.getElementById('#' + 'precName' + id).style.cssText = "opacity:0 !important; margin-right:3px; transition:0.7s;";
    document.getElementById('#' + 'prec' + id).style.cssText = "opacity:0 !important; margin-right:6px; transition:1s;";
}

function catButton() {
    if (((document.getElementById('buttonDownCat').getAttribute('class')) == 'fa fa-sort-up') || ((document.getElementById('buttonDownCat').getAttribute('class')) == 'fa fa-sort-desc')) {
        setTimeout(function () {
            document.getElementById('buttonDownCat').setAttribute('class', 'fa fa-sort-down');

            var list = document.getElementById("collapseExample").getElementsByTagName("li");
            for (var i = 0; i < list.length; i++) {
                list[i].style.cssText = "visibility:visible; transition:0" + i + "s; transition-delay:0." + i + "s";
            }
        }, 300);
    }
    if ((document.getElementById('buttonDownCat').getAttribute('class')) == 'fa fa-sort-down') {
        setTimeout(function () {
            document.getElementById('buttonDownCat').setAttribute('class', 'fa fa-sort-up');
            var list = document.getElementById("collapseExample").getElementsByTagName("li");
            for (var i = 0; i < list.length; i++) {
                list[i].style.cssText = "visibility:hidden; transition:0.5s; transition-delay:0." + i + "s";
            }
        }, 300);
    }
}

function NewLike(good_id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: "/addLike",
        data: {some: good_id},
        success: function (data) {
            var res = document.getElementById('#' + 'likeResult' + good_id);
            res.style.cssText = "opacity:1; margin-right:50px; font-weight:bold; color:green; transition:0.5s";
            res.innerHTML = data;
            setTimeout(function () {
                res.style.cssText = "opacity:0; font-weight:100; color:black; transition:1s";
                document.getElementById('#' + 'like' + good_id).style.cssText = "opacity:0; transition:2s;";
                setTimeout(function () {
                    document.getElementById('#' + 'like' + good_id).style.cssText = "visibility:hidden";
                    document.getElementById('#' + 'ratingValue' + good_id).innerHTML = parseInt(((document.getElementById('#' + 'ratingValue' + good_id)).innerHTML), 10) + 1;
                }, 100);
            }, 2000);
        },
        error: function (ts) {
            alert(ts.responseText)
        }
    });
}

function showSaleProducts(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/saleGoods',
        data: {sale_id: id},
        success: function (data) {
            document.getElementById('goodOfSale').innerHTML = data;
        },
        error: function (ts) {
            alert(ts.responseText)
        }
    });
}


function addLetterMemeber(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/letterMember',
        type: 'post',
        data: {user_id: id},
        success: function (data) {
            var news =  document.getElementById('newsMember');
            news.setAttribute('class','alert alert-success');
            news.style.cssText = "height:90px; text-align:center; font-size:25px; font-wight:bold; transition:0.5s;";
            news.innerHTML = data;
            setTimeout(function(){
                news.style.cssText = "opacity:0; text-align:center; height:0px; transition:0.5s;";
            },1000);
            setTimeout(function(){
                news.style.cssText = "visibility:hidden";
            },1500);
        },
        error: function (ts) {
            alert(ts.responseText);
        }

    });
}

function dropFromCart(good, user, cnt){
    $.ajax({
         headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
         },
         url: '/dropFromCart',
         type: 'post',
         data: {
                 user_id: user,
                 good_id: good,
                 count: cnt
        },
        success: ()=>{
            location.reload()
        }, 
        error: (err)=>{
            alert(err.responseText)
        }
    })
}


