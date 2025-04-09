// Change Number of Rows of text area in contact form 7 Code Start
document.addEventListener("DOMContentLoaded", function () {
  const textarea = document.querySelector('textarea[name="message"]');

  if (textarea) {
    textarea.rows = "5";
  }
});
// Change Number of Rows of text area in contact form 7 Code End

// Select the field value based on active post
document.addEventListener("DOMContentLoaded", function () {
  function updateSelectedField() {
    let activeTab = document.querySelector(".all-leaders .nav-link.active");
    let selectedField = document.querySelector("#products");

    if (activeTab && selectedField) {
      let activeId = activeTab.id;
      let options = selectedField.options;

      for (let option of options) {
        option.selected = option.value === activeId;
      }
    }
  }
  updateSelectedField();

  document.querySelectorAll(".all-leaders .nav-link").forEach((tab) => {
    tab.addEventListener("shown.bs.tab", function () {
      updateSelectedField();
    });
  });
});

// Remove p tag Form Submit Button in contact Form
document.addEventListener("DOMContentLoaded", function () {
  let container = document.querySelector(".join-us-btn p");
  if (container) {
    let parent = container.parentNode;
    while (container.firstChild) {
      parent.insertBefore(container.firstChild, container);
    }
    parent.removeChild(container);
  }
});

document.addEventListener("DOMContentLoaded", function () {
  // Initialize Select2 for the dropdown
  var dropdown = document.querySelector(".searching-dropdown");
  if (dropdown) {
    $(dropdown).select2({
      placeholder: "Search here...",
    });

    // Set the placeholder text when Select2 opens
    dropdown.addEventListener(
      "select2:open",
      function () {
        let searchField = document.querySelector(".select2-search__field");
        if (searchField) {
          searchField.placeholder = "Search here...";
        }
      },
      { once: true }
    ); // Ensures this event runs only once
  }
});
// Remove P tag from description Start
function removePTags() {
  const elements = document.querySelectorAll(".remove-p");
  elements.forEach((element) => {
    const pTags = element.querySelectorAll("p");
    pTags.forEach((p) => {
      const textNode = document.createTextNode(p.textContent);
      p.parentNode.replaceChild(textNode, p);
    });

    element.normalize();
  });
}
document.addEventListener("DOMContentLoaded", removePTags);
// Remove P tag from description End

// Marquee Slider Start
document.addEventListener("DOMContentLoaded", function () {
  const dropdownMenu = document.querySelector(".dropdown-menu_marquee");
  const marqueeInner = document.querySelector(".flex.marquee-inner");
  if (dropdownMenu) {
    dropdownMenu.addEventListener("click", function (event) {
      const listItem = event.target.closest("li");
      if (listItem) {
        const listItemId = listItem.id;
        const marqueeItems = marqueeInner.querySelectorAll(".marquee_items");

        marqueeItems.forEach((item) => {
          if (item.id === listItemId) {
            item.style.display = "flex";
          } else {
            item.style.display = "none";
          }
        });
      }
    });
  }
});
// Marquee Slider Start

// Switch Product Category Tab Start on Product Page Start

function switch_product_category_tab() {
  let urlhash = window.location.hash;
  let hashValue = urlhash.substring(1);
  
  let product_category_tabs = Array.from(document.querySelectorAll(".our_products .financial-tabs .nav-link"));
  let product_slugs = Array.from(document.querySelectorAll(".tab-content [id]")).map(el => el.id);
  if (!hashValue || !product_slugs.includes(hashValue)) {
    hashValue = product_slugs[0]; 
  }

  document.querySelectorAll(".tab-pane").forEach(tab => {
    tab.classList.remove("active", "show");
  });

  let activeTab = document.getElementById(hashValue);
  if (activeTab) {
    activeTab.classList.add("active", "show");
  }
  product_category_tabs.forEach(tab => tab.classList.remove("active"));

  let active_category = product_category_tabs.find(tab => tab.getAttribute("data-bs-target") === `#${hashValue}`);
  if (active_category) {
    active_category.classList.add("active");
  }
}
window.addEventListener("load", switch_product_category_tab);
window.addEventListener("hashchange", switch_product_category_tab);

// Switch Product Category Tab on Product Page End 