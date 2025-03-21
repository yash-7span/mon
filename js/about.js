const pinnedImageWrappers = document.querySelectorAll(
  ".usps-verticle-slider.desktop"
);
if (pinnedImageWrappers != null) {
  pinnedImageWrappers.forEach((wrapper) => {
    const inner = wrapper.querySelector(
      ".usps-verticle-slider.desktop .uspsMain"
    );
    const sections = gsap.utils.toArray(
      ".usps-verticle-slider.desktop .usps-item"
    );
    const numSections = sections.length - 1;
    const snapVal = 1 / numSections;
    let lastIndex = 0;
    const navLis = document.querySelectorAll(".gallery-thumbs .image-usps");
    ScrollTrigger.matchMedia({
      "(min-width: 992px)": function () {
        gsap.to(inner, {
          y: () =>
            -(inner.scrollHeight - document.documentElement.clientHeight) +
            "px",
          ease: "none",
          scrollTrigger: {
            start: "top 5%",
            trigger: wrapper,
            pin: true,
            pinTyped: "Fixed",
            scrub: true,
            markers: false,
            snap: snapVal,
            invalidateOnRefresh: true,
            end: () => `+=${inner.offsetHeight - sections.length}`,
            onUpdate: (self) => {
              const newIndex = Math.round(self.progress / snapVal);
              if (newIndex !== lastIndex) {
                navLis[lastIndex].classList.remove("is-active");
                navLis[newIndex].classList.add("is-active");

                sections[lastIndex].classList.remove("active");
                sections[newIndex].classList.add("active");

                lastIndex = newIndex;
              }
            },
          },
        });
      },
    });
  });
}

(function ($) {
  $.fn.visible = function (partial) {
    var $t = $(this),
      $w = $(window),
      viewTop = $w.scrollTop(),
      viewBottom = viewTop + $w.height(),
      _top = $t.offset().top / 1,
      _bottom = _top + $t.height(),
      compareTop = partial === true ? _bottom : _top,
      compareBottom = partial === true ? _top : _bottom;

    return compareBottom <= viewBottom && compareTop >= viewTop;
  };
})(jQuery);

jQuery(window).scroll(function (event) {
  jQuery(".js-scroll").each(function (i, el) {
    var el = jQuery(el);
    if (el.visible(true)) {
      el.addClass("scrolled");
    } else {
      el.removeClass("scrolled");
    }
  });
});

// change location dropdown button value on option click
const dropdownItems = document.querySelectorAll(
  ".location-dropdown .dropdown-item"
);
dropdownItems.forEach((item) => {
  item.addEventListener("click", function () {
    const selectedValue = this.textContent;
    const button = document.querySelector(".location-dropdown .btn-city");
    button.innerHTML = `${selectedValue} <div class="arrow">
                                   <div class="arrow-line left"></div>
                                   <div class="arrow-line right"></div>
                                   </div>`;
  });
});

$(document).ready(function () {
  $(".searching-dropdown").select2({
    searchInputPlaceholder: "Search here...",
  });

  $(".searching-dropdown").one("select2:open", function (e) {
    $("input.select2-search__field").prop("placeholder", "Search here...");
  });
});
