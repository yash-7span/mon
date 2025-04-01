// Header block Js code start
document.addEventListener('DOMContentLoaded', function () {
  const button = document.getElementById('toggleButton');

  button.addEventListener('click', function () {
    const isExpanded = button.getAttribute('aria-expanded') === 'false';
    button.setAttribute('aria-expanded', !isExpanded);

    if (!isExpanded) {
      button.querySelector('.navbar-toggler-icon').classList.add('expanded');
    } else {
      button.querySelector('.navbar-toggler-icon').classList.remove('expanded');
    }
  });
});
// Header block Js code End


// submenu overlay start
$(document).on("click", function () {
  // Check if the clicked element is NOT inside .dropdown, .navbar-toggler, or .submenu-overlay
  if (window.matchMedia("(min-width: 1200px)").matches) {
    $(document).on("click", function (event) {
      if (!$(event.target).closest(".dropdown, .navbar-toggler, .submenu-overlay").length) {
        $(".submenu-overlay").removeClass("enable");
        $(".seperator").removeClass("enable");
      }
    });
  }
});

if (window.matchMedia("(min-width: 1200px)").matches) {
  $(".dropdown").on("click", function (event) {
    event.stopPropagation(); // Prevents the click event from reaching the document
    $(".submenu-overlay").toggleClass("enable");
    $(".seperator").toggleClass("enable");
  });

  $(".submenu-overlay").on("click", function () {
    $(".submenu-overlay").removeClass("enable");
    $(".seperator").removeClass("enable");
  });
  $("#cookiescript_injected").on("click", function () {
    $(".submenu-overlay").removeClass("enable");
    $(".seperator").removeClass("enable");
  });
}
$(".navbar-toggler").on("click", function (event) {
  event.stopPropagation();
  $(".submenu-overlay").toggleClass("enable");
});


// submenu overlay end



// language switcher start
jQuery(document).ready(function ($) {
  let firstLanguageSwitcher = $("#language-switcher").first(); // Get the first instance
  let selectedLang = firstLanguageSwitcher.find("option:selected").text().trim() || "GB";


  // Update all elements with id="selected-language"
  $(".selected-language span").each(function () {
    $(this).text(selectedLang);
  });
  $(".language-switcher li").each(function () {
    if ($(this).text().trim() === selectedLang) {
      $(this).hide(); // Hide the selected language option
      updateLastLangClass();
    }
  });
});

jQuery(document).ready(function ($) {
  // Toggle visibility of language switcher when clicking on selected-language
  $(".selected-language").click(function () {
    $(".selected-language img").toggleClass('lang-arrow');
    $(".language-switcher").toggle(); // Toggle dropdown visibility
  });

  // Optionally, you can close the dropdown if a language is selected
  $(".language-switcher .lang-option a").click(function () {
    var selectedLang = $(this).text().trim(); // Get the selected language text
    $(".selected-language span").text(selectedLang); // Update the displayed language
    $(".language-switcher").hide(); // Hide the language options dropdown
  });
});

$(document).on("click", function (event) {
  // Check if the clicked element is NOT inside .dropdown, .navbar-toggler, or .submenu-overlay
  if (!$(event.target).closest(".selected-language").length) {
    $(".selected-language img").removeClass('lang-arrow');
    $(".language-switcher").hide();
  }
});

// language switcher end

// This Fun call when we hide the selected Language
function updateLastLangClass() {
  let lastVisibleLi = null;

  $(".language-switcher li").each(function () {
    if ($(this).css("display") !== "none") {
      lastVisibleLi = $(this);
    }
  });

  // Remove the 'last-lang' class from all <li> elements
  $(".language-switcher li").removeClass("last-lang");

  // Add the 'last-lang' class to the last visible <li>
  if (lastVisibleLi) {
    lastVisibleLi.addClass("last-lang");
  }
}

// Call the function to update the 'last-lang' class
updateLastLangClass();



//  Custom Js for Nav active class add issue
jQuery(document).ready(function ($) {
  const nav = $("nav");
  if (!nav.length) return; // Exit if no nav exists

  const links = nav.find("a");
  const currentPath = window.location.pathname;

  // Add 'active' class to matching links
  links.each(function () {
      if (this.href.endsWith(currentPath)) {
          $(this).addClass("active");
      }
  });

  // If body has class .home, remove .active from all links except the first one
  if ($("body").hasClass("home")) {
      const activeLinks = nav.find("a.active");
      activeLinks.not(":first").removeClass("active");
  }
});