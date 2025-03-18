(function(jQuery) {

     jQuery('.navbar-toggler').on('click', function() {
          jQuery('body').toggleClass('navbar-open');
     });

     // ************* on-scroll sticky-down header js start ****************//
     if (window.matchMedia("(min-width: 576px)").matches) {
          const elementToChange = document.querySelector('.head');
          let lastScrollTop = 0;
          window.addEventListener("scroll", function() {

               const scrollTop = window.scrollY || document.documentElement.scrollTop;
               if (scrollTop > lastScrollTop) {
                    elementToChange.classList.add("sticky-down");

               } else {
                    elementToChange.classList.remove("sticky-down");
               }
               lastScrollTop = scrollTop;
          });
     }

     function showModalIfNeeded() {
          if (!document.cookie.includes("modalShown") && !localStorage.getItem("modalShown")) {
               jQuery('.Get_It_Now').modal('show');
               jQuery('.add-full-block').fadeIn();

               document.cookie = "modalShown=true; expires=Fri, 24 May 2025 23:59:59 GMT; path=/";
               localStorage.setItem("modalShown", true);
          }
     }

     jQuery(window).load(function() {
          showModalIfNeeded();
     });
     //    end

     jQuery(".close_add_btn").on('click', function() {
          jQuery(".add-full-block").fadeOut(".add-full-block");
     });

     // jQuery(window).load(function(){
     //      jQuery('.Get_It_Now').modal('show');
     // })


})(jQuery);

// ************* on-scroll sticky-down header js end ****************//


// ************************* Hero-slider *********************** //
if (document.querySelector('.main-wrapper') != null) {
     var mrs = new Swiper('#heroSlider', {
          effect: "fade",
           fadeEffect: {
               crossFade: true,
             },
          autoplayDisableOnInteraction: true,
          loop: "true",
          speed: 1000,
          autoplay: {
               delay: 3000,
               disableOnInteraction: false,
           },
          pagination: {
               clickable: true,
               el: '.swiper-pagination',
          },

          scrollbar: {
               el: '.swiper-scrollbar',
          },
     });
}


// ************************ industry points -slider ************************* //
if (document.querySelector('.industry-sec') != null) {
     var industrySlider = new Swiper('.industrySlider', {
          slidesPerView: 1,
          centeredSlides: true,
          grabCursor: true,
          onlyInViewport: true,
          effect: 'fade',
          fadeEffect: {
               crossFade: true,
          },

          speed: 500,
          mousewheel: {
               releaseOnEdges: true,
          },
          // grabCursor: false,
          // freeMode: {
          //      enabled: true,
          //      sticky: true,
          // },
          pagination: {
               el: ".swiper-pagination",
          },

          breakpoints: {
               // 0: {
               //      centeredSlides: true,
               // },

               // 576:{
               //      centeredSlides: false,
               // }
          },

          on: {
               init: function() {
                    jQuery(".swiper-pagination-custom li").removeClass("active");
                    jQuery(".swiper-pagination-custom li").eq(0).addClass("active");

               },
               slideChangeTransitionStart: function() {

                    jQuery(".swiper-pagination-custom li").removeClass("active");
                    jQuery(".swiper-pagination-custom li").eq(industrySlider.realIndex).addClass("active");

               }
          },
     });
     jQuery(".swiper-pagination-custom li").mouseenter(function() {
          industrySlider.slideTo(jQuery(this).index());
          jQuery(".swiper-pagination-custom li").removeClass("active");
          jQuery(this).addClass("active");
     });

     if (jQuery(window).width() > 1199) {

          jQuery('.swiper-pagination-custom li:not(.line)').mouseenter(function() {
               var Y = $(this).index() * 120;
               jQuery('.swiper-pagination-custom > .line').css('top', Y + 'px');

               console.log(Y);
          });
     }

     if (jQuery(window).width() > 1399) {
          jQuery('.swiper-pagination-custom li:not(.line)').mouseenter(function() {
               var Y = $(this).index() * 150;
               jQuery('.swiper-pagination-custom > .line').css('top', Y + 'px');

               console.log(Y);
          });
     }

     if (jQuery(window).width() > 1600) {
          jQuery('.swiper-pagination-custom li:not(.line)').mouseenter(function() {
               var Y = $(this).index() * 140;
               jQuery('.swiper-pagination-custom > .line').css('top', Y + 'px');

               console.log(Y);
          });
     }

     if (jQuery(window).width() > 1800) {
          jQuery('.swiper-pagination-custom li:not(.line)').mouseenter(function() {
               var Y = $(this).index() * 145;
               jQuery('.swiper-pagination-custom > .line').css('top', Y + 'px');

               console.log(Y);
          });
     }

     if (jQuery(window).width() > 1600) {

          jQuery('.leadership-sec .swiper-pagination-custom li:not(.line)').mouseenter(function() {
               var Y = $(this).index() * 100;
               jQuery('.swiper-pagination-custom > .line').css('top', Y + 'px');

               console.log(Y);
          });
     }
     if (jQuery(window).width() > 1199) {

          jQuery('.leadership-sec .swiper-pagination-custom li:not(.line)').mouseenter(function() {
               var Y = $(this).index() * 90;
               jQuery('.swiper-pagination-custom > .line').css('top', Y + 'px');

               console.log(Y);
          });
     }


     // if (jQuery(window).width() < 1199) {

     //      jQuery('.swiper-pagination-custom li').click(function(){
     //      var X = $(this).index()*125;
     //      jQuery('.swiper-pagination-custom > .line').css('left', X + 'px');

     //      console.log(X);
     //      });
     // }
}


// ***************************** Testimonial -slider ********************************** //
var testimonialSlider = new Swiper('#testimonialSlides', {
     slidesPerView: 2,
     // slidesPerGroup: 1,
     centeredSlides: true,
     loop: true,
     speed: 500,

     // effect: "fade",
     navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
     },

     breakpoints: {
          1600: {
               spaceBetween: 160,
          },

          1399: {
               spaceBetween: 70,
          },

          992: {
               spaceBetween: 50,
          },

          0: {
               slidesPerView: 1,
               spaceBetween: 0,
          }

     }
});


// ************************ usp's verticle slider start ************************ //

jQuery(document).find('.usps-verticle-slider.mobile').each(function(e) {
     var uspsMain = new Swiper('.usps-verticle-slider.mobile .uspsMain', {
          direction: 'vertical',
          grabCursor: true,
          speed: 800,
          slidesPerView: 3,
          slideVisibleClass: 'swiper-slide-visible',
          slideFullyVisibleClass: 'swiper-slide-fully-visible',
          slideToClickedSlide: true,
          mousewheel: {
               releaseOnEdges: true,
          },

          pagination: {
               el: ".swiper-pagination",
          },

          breakpoints: {
               1800: {
                    slidesPerView: 3,
               },

               1600: {
                    slidesPerView: 2.5,
               },

               992: {
                    slidesPerView: 2,
               },

               768: {
                    slidesPerView: 1,
                    direction: 'horizontal',
               },
               319: {
                    slidesPerView: 1,
                    direction: 'horizontal',
               }
          }

     });
});

// jQuery(document).find('.usps-verticle-slider').each(function(e) {
//      var uspsMain = new Swiper('.uspsMain', {
//           direction: 'vertical',
//           grabCursor: true,
//           speed: 800,
//           slidesPerView: 3,
//           slideVisibleClass: 'swiper-slide-visible',
//           slideFullyVisibleClass: 'swiper-slide-fully-visible',
//           slideToClickedSlide: true,

//           pagination: {
//                el: ".swiper-pagination",
//           },

//           on: {
//                init: function() {
//                     if (window.matchMedia("(min-width: 992px)").matches) {
//                          jQuery(".swiper-pagination-custom .swiper-pagination-switch").removeClass("active");
//                          jQuery(".swiper-pagination-custom .swiper-pagination-switch").eq(0).addClass("active");
//                     }
//                },
//                slideChangeTransitionStart: function() {
//                     if (window.matchMedia("(min-width: 992px)").matches) {
//                          jQuery(".swiper-pagination-custom .swiper-pagination-switch").removeClass("active");
//                          jQuery(".swiper-pagination-custom .swiper-pagination-switch").eq(uspsMain.realIndex).addClass("active");
//                          uspsMain.params.mousewheel.releaseOnEdges = false;

//                     }
//                },
//                reachEnd: function() {
//                     if (window.matchMedia("(min-width: 992px)").matches) {
//                          setTimeout(function() {
//                               uspsMain.params.mousewheel.releaseOnEdges = true;
//                          }, 1500);
//                     }
//                },
//           },

//           breakpoints: {
//                1800: {
//                     slidesPerView: 3,
//                },

//                1600: {
//                     slidesPerView: 2.5,
//                },

//                992: {
//                     slidesPerView: 2,
//                },

//                768: {
//                     slidesPerView: 1,
//                     direction: 'horizontal',
//                },
//                319: {
//                     slidesPerView: 1,
//                     direction: 'horizontal',
//                }
//           }

//      });

//      if (window.matchMedia("(min-width: 992px)").matches) {
//           var galleryThumbs = new Swiper('.gallery-thumbs', {
//                direction: 'vertical',
//                slidesPerView: 1,
//                grabCursor: true,
//                preventInteractionOnTransition: true,
//                mousewheel: {
//                     releaseOnEdges: true,
//                },
//                speed: 800,
//                effect: 'fade',
//                fadeEffect: {
//                     crossFade: true,
//                },
//                thumbs: {
//                     swiper: uspsMain,
//                },
//                on: {
//                     slideChangeTransitionStart: function() {
//                          if (galleryThumbs.activeIndex == 3) {
//                               jQuery('.uspsMain').find('.swiper-slide.four').addClass('active-last-second');
//                          }
//                          if (galleryThumbs.activeIndex == 4) {
//                               jQuery('.uspsMain').find('.swiper-slide.four').addClass('active-last-second');
//                          }
//                          if (galleryThumbs.activeIndex < 3) {
//                               jQuery('.uspsMain .swiper-slide.four').removeClass('active-last-second');
//                          }
//                     },
//                },

//           });

//           galleryThumbs.on("slideChangeTransitionStart", function() {
//                uspsMain.slideTo(galleryThumbs.activeIndex);
//           });
//           uspsMain.on("transitionStart", function() {
//                galleryThumbs.slideTo(uspsMain.activeIndex);
//           });

//      }
// });
// end


//*********************nav-tabs about-page*************************//
document.querySelectorAll('.whoWeAre a').forEach(function(hoveritem) {

     var activeTab = new bootstrap.Tab(hoveritem)
     hoveritem.addEventListener('mouseover', function() {
          activeTab.show();
     });

     if ($(window).width() > 1200) {
          jQuery('.whoWeAre.nav-tabs a:not(.border-left)').mouseenter(function() {
               var Y = $(this).index() * 140;
               jQuery('.whoWeAre.nav-tabs > .border-left').css('top', Y + 'px');

               console.log(Y);
          });
     }
     if ($(window).width() < 1200) {
          jQuery('.whoWeAre.nav-tabs a:not(.border-left)').mouseenter(function() {
               var Y = $(this).index() * 125;
               jQuery('.whoWeAre.nav-tabs > .border-left').css('top', Y + 'px');

               console.log(Y);
          });
     }
     if ($(window).width() < 991) {
          jQuery('.whoWeAre.nav-tabs a:not(.border-left)').mouseenter(function() {
               var Y = $(this).index() * 80;
               jQuery('.whoWeAre.nav-tabs > .border-left').css('top', Y + 'px');

               console.log(Y);
          });
     }

});
// end //




// ***************************** History -slider ********************************** //
var historySlider = new Swiper('.historyslider', {


     direction: "horizontal",
     effect: 'fade',
     fadeEffect: {
          crossFade: true
     },

     autoplay: {
          delay: 5000,
     },

     speed: 1500,
     pagination: {
          el: ".swiper-pagination",
          type: "progressbar",
          dynamicBullets: true,
     },


     breakpoints: {
          320: {
               autoplay: {
                    delay: 5000,
               },
               speed: 500,
          }
     },
     on: {
          init: function() {
               jQuery(".swiper-pagination-timeline .swiper-pagination-switch").removeClass("on-active");
               jQuery(".swiper-pagination-timeline .swiper-pagination-switch").eq(0).addClass("on-active");

          },
          slideChangeTransitionStart: function() {

               jQuery(".swiper-pagination-timeline .swiper-pagination-switch").removeClass("on-active");
               jQuery(".swiper-pagination-timeline .swiper-pagination-switch").eq(historySlider.realIndex).addClass("on-active");

          }
     },
});
jQuery(".swiper-pagination-timeline .swiper-pagination-switch").click(function() {
     historySlider.slideTo(jQuery(this).index());
     jQuery(".swiper-pagination-timeline .swiper-pagination-switch").removeClass("on-active");
     jQuery(this).addClass("on-active");
});



// ***************************** Responsibility - carousel ********************************** //
var Responsibility = new Swiper(".responsibility-carousel", {
     slidesPerView: "auto",
     loop: false,
     speed: 800,
     direction: "horizontal",
     grabCursor: true,

     pagination: {
          el: ".swiper-pagination",
          dynamicBullets: true,
          clickable: true,
     },

     mousewheel: {
          releaseOnEdges: true,
     },

     breakpoints: {

          0: {
               slidesPerView: "1",
               centeredSlides: true,
               spaceBetween: 15,
          },

          380: {
               slidesPerView: "auto",
               slidesOffsetBefore: 15,
               slidesOffsetAfter: 15,
               spaceBetween: 16,
          },

          479: {
               slidesPerView: "auto",
               spaceBetween: 16,
               slidesOffsetBefore: 30,
               slidesOffsetAfter: 30,
          },

          768: {
               spaceBetween: 20,
               slidesOffsetBefore: 30,
               slidesOffsetAfter: 30,
          },

          1024: {
               spaceBetween: 20,
               slidesOffsetBefore: 50,
               slidesOffsetAfter: 50,
          },

          1200: {
               slidesOffsetBefore: 50,
               slidesOffsetAfter: 50,
               spaceBetween: 25,
          },

          1600: {
               slidesOffsetBefore: 100,
               slidesOffsetAfter: 100,
               spaceBetween: 40,

          },

     },
});

// contact-form js //
jQuery(".upload-btn").hide()

jQuery('#purpose').on('change', function() {
     if (jQuery("#purpose").val() === "For Career Inquiry") {
          jQuery(".upload-btn").show();
          jQuery(".cust_companyName").hide();
          // jQuery(".cust_subject").hide();
          // jQuery(".cust_mrs").hide();
          jQuery(".segment.default_show").hide();
     }

     if (jQuery("#purpose").val() === "For Buisness Inquiry") {
          jQuery(".segment").show();
          jQuery(".cust_subject").show();
          jQuery(".cust_companyName").show();
          jQuery(".upload-btn").hide();
          // jQuery(".segment.default_show").show();

     }

     if (jQuery("#purpose").val() === "For General Inquiry") {
          jQuery(".cust_companyName").hide();
          jQuery(".segment.default_show").hide();
          jQuery(".upload-btn").hide();
     }

});
jQuery(".upload-btn").hide();
// jQuery(".cust_subject").show();
// jQuery(".cust_mrs").show();
jQuery(".segment.default_show").show();

// end



// ******** calendar -js********** //


if (document.querySelector('#calendar') != null) {
     const calendar = new VanillaCalendar('#calendar', {
          popups: {
               '2024-01-31': {
                    modifier: 'bg-red',
                    html: 'Annual General Meeting',
               },
          },
     });


     calendar.init();
}




//*** linking a tabs in leadership-detail page ***//
document.addEventListener('DOMContentLoaded', function() {
     var hash = window.location.hash;
     if (hash) {
          var tabId = hash.substring(1);
     }
     var tabMain = document.querySelector('.nav-tabs a[data-bs-target="#' + tabId + '"]');
     if (tabMain) {
          tabMain.click();
     }
});


if (document.querySelector('.leader-tabs') != null) {
     var buttons = document.querySelectorAll('.leader-tabs .nav-link');
     buttons.forEach(function(button) {
          button.addEventListener('click', function() {
               var activeTab = document.querySelector('.leader-tabs .tab-pane.active.show');
               if (activeTab) {
                    // alert('test');
                    activeTab.classList.remove('active', 'show');

                    activeTab.classList.add('active', 'show');
               }
          });
     });
}

//warehouse active-tab 27-05 
if (document.querySelector('.our-locations') != null) {
     document.addEventListener('DOMContentLoaded', function() {
          var hash = window.location.hash;
          if (hash) {
               var tabId = hash.substring(1);
          }
          var tabMain = document.querySelector('.redirectTabs a[data-bs-target="#' + tabId + '"]');
          if (tabMain) {
               tabMain.click();
          }
     });
}




// read-more jquery //
if (document.querySelector('.governace_main') != null) {

     let moreContent = document.getElementById("more-less");
     let moreContentP = document.getElementById("governace_main");
     moreContent.addEventListener("click", function() {
          moreContentP.classList.toggle('full-content');
     });

}

// tooltip on-hover
// $(function () {
//   $('[data-toggle="tooltip"]').tooltip({delay: { "show": 500, "hide": 100 }})
// })



//************** dynamic name change on title js ******************//
if (document.querySelector('.change_items') != null) {
     document.querySelectorAll('.our__categories .targetDiv').forEach(button => {
          button.addEventListener('click', function() {
               const target = this.getAttribute('data-target');
               document.querySelectorAll('.view_block').forEach(content => {
                    if (content.getAttribute('data-value') === target) {
                         content.classList.add('show-value');
                    } else {
                         content.classList.remove('show-value');
                    }
               });
          });
     });
}
// end

//*************  navbar-active text js **********************//
const openMobileMenuBtn = document.querySelector(".device-menu");
const headerMenu = document.querySelector(".header-menus");


document.addEventListener("DOMContentLoaded", function() {
     const nav = document.querySelector("nav");
     const links = nav.querySelectorAll("a");

     const currentPath = window.location.pathname;

     links.forEach(function(link) {
          if (link.href.endsWith(currentPath)) {
               link.classList.add("active");
          }
     });
});


//************** responsive menu bar js *******************************//
if (document.querySelector('.header-menus') != null) {
     document.addEventListener('DOMContentLoaded', function() {
          var nvp = window.matchMedia('(max-width: 991px)');
          if (nvp.matches) {

               navItems = document.querySelectorAll('.dropdown-menu');
               for (var i = 0, len = navItems.length; i < len; i++) {
                    navItems[i].onclick = function(e) {
                         e.stopPropagation();
                    }
               };
          }
     });

}

//*************************** replace to data-bs-hover in navbar js **************************//
var nvp2 = window.matchMedia('(max-width: 991px)');
if (nvp2.matches) {
     function replaceAttribute(element, oldName, newName) {
          // Check if element exists and attributes are strings
          if (element && typeof oldName === 'string' && typeof newName === 'string') {
               // Get current attribute value
               const value = element.getAttribute(oldName);

               // Remove the old attribute
               element.removeAttribute(oldName);

               // Set the new attribute with the same value
               element.setAttribute(newName, value);
          }
     }
     // Example usage:
     const myElement = document.querySelector('.myElement');
     replaceAttribute(myElement, "data-bs-hover", "data-bs-toggle");

     const myElement2 = document.querySelector('.myElement2');
     replaceAttribute(myElement2, "data-bs-hover", "data-bs-toggle");

     const myElement3 = document.querySelector('.myElement3');
     replaceAttribute(myElement3, "data-bs-hover", "data-bs-toggle");

     const myElement4 = document.querySelector('.myElement4');
     replaceAttribute(myElement4, "data-bs-hover", "data-bs-toggle");

     const myElement5 = document.querySelector('.myElement5');
     replaceAttribute(myElement5, "data-bs-hover", "data-bs-toggle");
}


// document.querySelector('.inquiry-form-overlay').style.display = 'none';

// document.querySelector('.request_btn').addEventListener('click', function() {
//   let dataElement = document.querySelector('.inquiry-form-overlay');
//   dataElement.style.display = (dataElement.style.display === 'none' ? 'block' : 'none');
// });

// inquiry form js onclick //
document.addEventListener('DOMContentLoaded', function() {
     // Select all elements with the 'request_btn' class
     var requestButtons = document.querySelectorAll('.request_btn');
 
     // Add click event listener to each button
     requestButtons.forEach(function(button) {
         button.addEventListener('click', function(event) {
             // Prevent the default action of the link if it's wrapped in an <a> tag
             event.preventDefault();
             
             // Show the inquiry form overlay instead of toggling
             let dataElement = document.querySelector('.inquiry-form-overlay');
             if (dataElement) {
                 dataElement.style.display = 'block'; // Always set to 'block'
             }
             
             // Scroll to the 'inquiryForm' element
             var inquiryForm = document.getElementById('inquiryForm');
             if (inquiryForm) {
                 inquiryForm.scrollIntoView({
                     behavior: 'smooth'
                 });
             }
         });
     });
 });