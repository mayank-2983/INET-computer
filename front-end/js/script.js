

// header sticky on scroll
var lstScrollTop = 0;
navbar = $("header")
window.addEventListener("scroll",function(){
  var scrollTop = window.pageYOffset || this.document.documentElement.scrollTop;

  if(scrollTop > lstScrollTop){
    // navbar.style.top="-80px";
    navbar.addClass("head-top");
  }
  else{
    // navbar.style.top="0px";
    navbar.removeClass("head-top");
  }

  lstScrollTop = scrollTop;
})
// shlideshow swiper 
var swiper = new Swiper(".mySwiper", {
  spaceBetween: 30,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});


//category swipe
var swiper = new Swiper(".mySwiper2", {
  slidesPerView: 6,
  spaceBetween: 30,
  // loop: true, 
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  }, breakpoints: {
    // when window width is >= 320px
    360:{
      slidesPerView: 2,
    },
    573: {
      slidesPerView: 4,
    
    },
    // when window width is >= 480px
    768: {
      slidesPerView: 5,
      
    },
    // when window width is >= 640px
    1000: {
      slidesPerView: 6,
     
    }
  },
});

// product-slider 
var swiper = new Swiper(".mySwiper3", {
  slidesPerView: 6,
  spaceBetween: 0,
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    // when window width is >= 320px
    360:{
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 3,
    
    },
    // when window width is >= 480px
    1024: {
      slidesPerView: 4,
      
    },
    // when window width is >= 640px
    1190: {
      slidesPerView: 6,
     
    }
  },
});


// for categories swiper 
var swiper = new Swiper(".mySwiper4", {
  slidesPerView: 6,
  spaceBetween: 0,
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
var swiper = new Swiper(".mySwiper5", {
  slidesPerView: 6,
  spaceBetween: 0,
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// blog swiper 
var swiper = new Swiper(".mySwiperblg", {
  slidesPerView: 3,
  spaceBetween: 30,
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    // when window width is >= 320px
    360:{
      slidesPerView: 1,
    },760:{
      slidesPerView: 2,
    },
  
    // when window width is >= 640px
    1200: {
      slidesPerView: 3,
     
    }
  },
});

// brand swiper 
var swiper = new Swiper(".mySwiperbrd", {
  slidesPerView: 6,
  spaceBetween: 30,
  autoplay: {
    delay: 1200,
  },
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  }, breakpoints: {
    // when window width is >= 320px
    360:{
      slidesPerView: 3,
      spaceBetween: 10,
    },
    656:{
      slidesPerView: 4,
    },
    // when window width is >= 480px
    1024: {
      slidesPerView: 5,
      spaceBetween: 20,
      
    },
    // when window width is >= 640px
    1190: {
      slidesPerView: 6,
     
    }
  },
});

// rview swiper 

var swiper = new Swiper(".mySwiperrvw", {
  slidesPerView: 3.5,
  spaceBetween: 20,
  autoplay: {
    delay: 1400,
  },breakpoints: {
    // when window width is >= 320px
    360:{
      slidesPerView: 1,
    },
    768:{
      slidesPerView: 2,
    },
    994: {
      slidesPerView: 3,
    
    },
    // when window width is >= 480px
    1040: {
      slidesPerView: 3.5,
      
    },
 
  },
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

 
$(".pro-icon").click(function () {


  var cls = $(this).data("name");
  $(`.${cls}`).toggleClass("active-icon");
  if (cls == "s1") {
    $(`.c1`).removeClass("active-icon");
    $(`.f1`).removeClass("active-icon");
    $(`.m1`).removeClass("active-icon");

  } else if (cls == "c1") {
    $(`.s1`).removeClass("active-icon");
    $(`.f1`).removeClass("active-icon");
    $(`.m1`).removeClass("active-icon");

  }
  else if (cls == "f1") {
    $(`.c1`).removeClass("active-icon");
    $(`.s1`).removeClass("active-icon");
    $(`.m1`).removeClass("active-icon");
  }
  else if (cls == "m1") {
    $(`.c1`).removeClass("active-icon");
    $(`.f1`).removeClass("active-icon");
    $(`.s1`).removeClass("active-icon");
  }

});

window.onscroll = () => {

  $(`.c1`).removeClass("active-icon");
  $(`.f1`).removeClass("active-icon");
  $(`.s1`).removeClass("active-icon");
  $(`.m1`).removeClass("active-icon");
}


// isotop tab 
var $grid = $(".grid").isotope({
  itemSelector: '.grid-item',
  layoutMode: 'fitRows',
})
// filter item on button click 
$(".button-group").on("click", "buttton", function () {
  var filtervalue = $(this).attr('data-filter');
  $grid.isotope({ filter: filtervalue });

})


// tab 
const tabBtn = document.querySelectorAll(".tab__btn");
const tabContents = document.querySelectorAll(".tab__item");

tabBtn.forEach(function (element) {
  element.addEventListener("click", openTabs);
});

function openTabs(evt) {
  const btnTarget = evt.currentTarget;
  const item = btnTarget.dataset.item;

  tabContents.forEach(function (item) {
    item.classList.remove("tab__item--active");
  });

  tabBtn.forEach(function (item) {
    item.classList.remove("tab__btn--active");
  });

  document.querySelector(`#${item}`).classList.add("tab__item--active");

  btnTarget.classList.add("tab__btn--active");
}



// model Popup
$(".pop-up-email").hide();

setTimeout(function() {
  $(".pop-up-email").show();
}, 5000);

$(".close-btn").click(function(){
  $(".pop-up-email").hide();
 
});


$(".popUp-form").submit(function(){
  $(".pop-up-email").hide();
})


$(".pop-up-email").click(function(e){
  if(e.target != this ){

  }else{
    
    $(".pop-up-email").hide();
  }
})

document.addEventListener("keydown",function(e){
  console.log(e)
  if (e.keyCode == 27){
    $(".pop-up-email").hide();
  }
})
 
 
//  ***************************** product page ***********************************************
//main prouct swiper 
var swiper = new Swiper(".mySwiperpropage", {
    spaceBetween: 10,
    slidesPerView: 4,

    freeMode: true,
    watchSlidesProgress: true,
  });
  var swiper2 = new Swiper(".mySwiperpropage2", {
    spaceBetween: 10,
    loop: true,
    autoplay: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });


//   quantity
  $(document).ready(function() {
    const minus = $('.quantity__minus');
    const plus = $('.quantity__plus');
    // const input = $('.quantity__input');
    minus.click(function(e) {
      e.preventDefault();
      const input = $(`.quantity__input[data-id='${$(this).data("id")}']`);
      var value = input.val();
      if (value > 1) {
        value--;
      }else{
        alert("Quantity must be 1")
      }
      input.val(value);
    });
    
    plus.click(function(e) {
      const input = $(`.quantity__input[data-id='${$(this).data("id")}']`);
      e.preventDefault();
      var value = input.val();
      if (value < 10){
        value++;
      }else{
        alert("Stock is Lost")
      }
      input.val(value);
    })
  });


   // tabs 
function Tabs() {
    var bindAll = function() {
      var menuElements = document.querySelectorAll('[data-tab]');
      for(var i = 0; i < menuElements.length ; i++) {
        menuElements[i].addEventListener('click', change, false);
      }
    }
  
    var clear = function() {
      var menuElements = document.querySelectorAll('[data-tab]');
      for(var i = 0; i < menuElements.length ; i++) {
        menuElements[i].classList.remove('active');
        var id = menuElements[i].getAttribute('data-tab');
        document.getElementById(id).classList.remove('active');
      }
    }
  
    var change = function(e) {
      clear();
      e.target.classList.add('active');
      var id = e.currentTarget.getAttribute('data-tab');
      document.getElementById(id).classList.add('active');
    }
  
    bindAll();
  }
  var connectTabs = new Tabs();

  // releted product swiper 
var swiper = new Swiper(".mySwiperrp", {
    slidesPerView: 5,
    spaceBetween: 20,
    freeMode: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },breakpoints: {
      // when window width is >= 320px
      360:{
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 3,
      
      },
      // when window width is >= 480px
      1024: {
        slidesPerView: 4,
        
      },
      // when window width is >= 640px
      1190: {
        slidesPerView: 5,
       
      }
    },
  });

  $(window).scroll(function() {    // this will work when your window scrolled.
    var height = $(window).scrollTop();  //getting the scrolling height of window
    var heightb = $(document).height() - 100;
    if(height  > 700) {
      $(".pro-menu-bar").css({"display": "block"});
    } 
    else if(height == heightb)
    {
      $(".pro-menu-bar").css({"display": "none"});
    }
    else{
      $(".pro-menu-bar").css({"display": "none"});
    }
  });


// reiew form validation 
$(document).ready(function () {
    $('.spanreview').hide();
    $('.spanname').hide();
    $('.spanemail').hide();
    $('.spancheck').hide();

    var review_error = true;
    var name_error = true;
    var email_error = true;
    var check_error = true;

    $(".ratingmessage").blur(function () {
        check_ratingmessage();
    });
    $(".yourname").blur(function () {
        check_yourname();
    });
    $(".email").blur(function () {
        check_email();
    });

    function check_ratingmessage() {
        var review_val = $('.ratingmessage').val();
        var letters = /^[A-Za-z ]+$/;
        if (review_val == '') {
            $('.spanreview').show();
            $('.spanreview').html("*Please enter Review!");
            review_error = false;
            return false;
        } else {
          $('.spanreview').hide();
                review_error = true;
          
        }
    }

    function check_yourname() {
        var name_val = $('.yourname').val();
        var letters = /^[A-Za-z ]+$/;
        if (name_val == '') {
            $('.spanname').show();
            $('.spanname').html("*Please enter Name!");
            name_error = false;
            return false;
        } else {
            if (!(name_val.match(letters))) {
                $('.spanname').show();
                $('.spanname').html("*Please enter a-z A-Z only!");
                lname_error = false;
                return false;
            } else {
                $('.spanname').hide();
                name_error = true;
            }
        }
    }

    function check_email() {
        var email_val = $('.email').val();
        var email = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
        if (email_val == '') {
            $('.spanemail').show();
            $('.spanemail').html("*Please enter Email!");
            email_error = false;
            return false;
        } else {
            if (!(email_val.match(email))) {
                $('.spanemail').show();
                $('.spanemail').html("*Please enter Valid Email!");
                email_error = false;
                return false;
            } else {
                $('.spanemail').hide();
                email_error = true;
            }
        }
    }

    $('#submit').click(function () {

        review_error = true;
        name_error = true;
        email_error = true;



        check_ratingmessage();
        check_yourname();
        check_email();


        if (review_error == true && name_error == true && email_error) {
            return true;
        } else {
           
            return false;
        }
    });

});


// ****************************************** cart page **************************************

var swiper = new Swiper(".mySwiperCrtpg", {
    slidesPerView: 5,
    spaceBetween: 20,
    freeMode: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },breakpoints: {
      // when window width is >= 320px
      360:{
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 3,
      
      },
      // when window width is >= 480px
      1024: {
        slidesPerView: 4,
        
      },
      // when window width is >= 640px
      1190: {
        slidesPerView: 5,
       
      }
    },
  });



  
   


