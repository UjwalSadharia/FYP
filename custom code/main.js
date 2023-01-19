// Header scroll 
let navigation = document.querySelector(".navbar")
window.onscroll=function(){
    if(window.pageYOffset > 15){
        navigation.classList.add("header_scrolled");
    }else{
        navigation.classList.remove("header_scrolled")
    }
}

//nav hide - to close navbar automatically after clicking ...on small devices
let navBar = document.querySelectorAll(".nav-link");
// let navBar = document.querySelectorAll(".navbar-nav li");
let navCollapse =document.querySelector(".navbar-collapse");
navBar.forEach(function(a){
    a.addEventListener("click",function(){
        navCollapse.classList.toggle("show");
    })
})








//owl carousel 
$(document).ready(function(){
    $(".client-slider-section").owlCarousel({
        items: 4,
        loop : true,
        nav : false,
        autoplay: true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:2
            },
            600: {
                items:4
            },
            1000: {
                items:6
            }
        }

    });
});