var data = 1;
var TotalItem = 0;
var item = 0;
var item1 = 0;


document.getElementById("outputCart").innerText=item;
document.getElementById("indexCart").innerText=item1;
document.getElementById("output").innerText=data;

function decrement() {

    if (data === 1){
        data = 1;
    }else {
        data = data - 1;
    }
    document.getElementById("output").innerText=data;
}

function increment() {

    data = data +1;
    document.getElementById("output").innerText=data;

}


//-------------Add cart first function for detail second function for index--------------------

function addItem() {

    item = item + 1;
    document.getElementById("outputCart").innerText=item;
}

function reset(){

    item = 0;
    TotalItem = 0;
    const x1 = document.getElementById("div1");
    x1.style.display = "none";
    const x2 = document.getElementById("div2");
    x2.style.display = "none";
    const x3 = document.getElementById("div3");
    x3.style.display = "none";
    const x4 = document.getElementById("div4");
    x4.style.display = "none";
    const x5 = document.getElementById("div5");
    x5.style.display = "none";
    const x6 = document.getElementById("div6");
    x6.style.display = "none";

    const y = document.getElementById("TotalPrice").innerText = 0;
    const y1 = document.getElementById("outputCart").innerText = 0;

}

function addModal1(){

    TotalItem += 23.9;
    const x = document.getElementById("div1");
    x.style.display = "flex";
    document.getElementById('outputCardName1').innerHTML = "Best sandwich";
    document.getElementById('outputCardPrice1').innerHTML = 23.9;
    document.getElementById('TotalPrice').innerHTML = TotalItem.toFixed(2);
}

function addModal2(){

    TotalItem += 25.9;
    const x = document.getElementById("div2");
    x.style.display = "flex";
    document.getElementById('outputCardName2').innerHTML = "Burger";
    document.getElementById('outputCardPrice2').innerHTML = 25.9;
    document.getElementById('TotalPrice').innerHTML = TotalItem.toFixed(2);
}

function addModal3(){

    TotalItem += 27.5;
    const x = document.getElementById("div3");
    x.style.display = "flex";
    document.getElementById('outputCardName3').innerHTML = "Burger Meal";
    document.getElementById('outputCardPrice3').innerHTML = 27.5;
    document.getElementById('TotalPrice').innerHTML = TotalItem.toFixed(2);
}

function addModal4(){

    TotalItem += 32.9;
    const x = document.getElementById("div4");
    x.style.display = "flex";
    document.getElementById('outputCardName4').innerHTML = "Best Deal Meal";
    document.getElementById('outputCardPrice4').innerHTML = 32.9;
    document.getElementById('TotalPrice').innerHTML = TotalItem.toFixed(2);
}

function addModal5(){

    TotalItem += 19.4;
    const x = document.getElementById("div5");
    x.style.display = "flex";
    document.getElementById('outputCardName5').innerHTML = "Chicken Burger";
    document.getElementById('outputCardPrice5').innerHTML = 19.4;
    document.getElementById('TotalPrice').innerHTML = TotalItem.toFixed(2);
}

function addModal6(){

    TotalItem += 28.5;
    const x = document.getElementById("div6");
    x.style.display = "flex";
    document.getElementById('outputCardName6').innerHTML = "Pizza";
    document.getElementById('outputCardPrice6').innerHTML = 28.5;
    document.getElementById('TotalPrice').innerHTML = TotalItem.toFixed(2);
}


function addIndexItem() {

    item1 = item1 + 1;
    document.getElementById("indexCart").innerText=item1;
}

// ------------------count character------------------

function count(obj) {

    document.getElementById("countChar").innerHTML = obj.value.length + "/500";

}

//---------------------------To add a default value for name input---------------------------------

// function customer() {

//     if(document.getElementById("Name1").value === "" & !(document.getElementById("Review").value === "")){
//         document.getElementById("Name1").value = "Customer";


//     }

// }
function addModal(n){
    if (n == 1){
        addModal1();
    }else if (n == 2){
        addModal2();
    }else if (n == 3){
        addModal3();
    }else if (n == 4){
        addModal4();
    }else if (n == 5){
        addModal5();
    }else if (n == 6){
        addModal6();
    }
}


function display() {

    const y = document.getElementById("contact us");
    y.style.marginTop = "52rem";

}

//--------------------To check the input of review before submitting-----------------------
function addReview(event) {
    
    event.preventDefault();
    
    if(document.getElementById("Review").value === "") {
        const x = document.getElementById("warning")
        x.style.display = "block";
        return false;
    };
    var reviewForm = document.forms.formReview; // Get the form by its name attribute

    var data = new FormData(reviewForm); // store the form data into an object

    // Begin ajax call
    var http = new XMLHttpRequest(); 

    http.open("POST","php/review.php",true); // Open a post request

    http.onreadystatechange = function() { // Get request result
        if (this.readyState == 4 && this.status == 200) {
            // check if request result is true 
            let response = this.responseText;
            if (response) {
                //hide form
                document.querySelector(".userForm").classList.add("hide");
                document.querySelector(".userForm").classList.remove("show");

                document.getElementById("contact us").style.marginTop = "2rem";

                // call show review method
                showReview();
            }
        }
    };
    http.send(data); // send the request
}
