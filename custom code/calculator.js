
function checnum(as) {
    var a = as.value;
    for (var x = 0; x < a.length; x++) {
        var ff = a[x];
        if (isNaN(a) || ff == " ") {
            a = a.substring(0, (a.length - 1));
            as.value = a;
        }
    }
}
function getCheckedValue(groupName) {
    var radios = document.getElementsByName(groupName);
    for (i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            return radios[i].value;
        }
    }
    return null;
}
function tqe_perc() {
    var sds = document.getElementById("dum");
    if (sds == null) {
        alert("You are using a free package.\n You are not allowed to remove the copyright.\n");
    }
    var sdss = document.getElementById("dumdiv");
    if (sdss == null) {
        alert("You are using a free package.\n You are not allowed to remove the copyright.\n");
    }
    if (sdss != null) {
        var totamount = 0;
        var p1 = document.getElementById("amount").value;
        var age1 = document.getElementById("age").value;
        if (age1 == "")


        $(document).ready(function(){
            $("#err_msg").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Enter the current age<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>')
        })

        else if (p1 == "")
            $(document).ready(function(){
                $("#err_msg").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Enter the premium payable<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>')
            })
        else {
            document.getElementById("err_msg").innerHTML = "";
            var p = parseFloat(p1);
            var age = parseFloat(age1);
            var y = parseFloat(getCheckedValue("year"));
            var t = getCheckedValue("t")
            if (p == "" || age == "" || y == "") {
                alert("enter the amount,interstand year");
            }
            else {
                if (t == "Yearly") {
                    totamount = (y * p) + (y * 500 * 41);
                    document.getElementById("r1").value = totamount;
                }
                else {
                    totamount = (p * 12 * y) + (y * 500 * 41);
                    document.getElementById("r1").value = totamount;
                }
            }
        }
    }
    //alert(totamount+(p*y*6/100));
}

