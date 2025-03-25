// Change Number of Rows of text area in contact form 7
document.addEventListener("DOMContentLoaded", function () {
    const textarea = document.querySelector('textarea[name="message"]');

    if (textarea) {
        textarea.rows = "5"; 
    }
});

// // Select the field value based on active post
// document.addEventListener("DOMContentLoaded", function () {
//     function updateSelectedField() {
//         let activeTab = document.querySelector(".all-leaders .nav-link.active"); 
//         let selectedField = document.querySelector("#products"); 

//         if (activeTab && selectedField) {
//             let activeId = activeTab.id; 
//             let options = selectedField.options;

//             for (let option of options) {
//                 option.selected = option.value === activeId; 
//             }
//         }
//     }
//     updateSelectedField();

//     document.querySelectorAll(".all-leaders .nav-link").forEach(tab => {
//         tab.addEventListener("shown.bs.tab", function () {
//             updateSelectedField();
//         });
//     });
// });
