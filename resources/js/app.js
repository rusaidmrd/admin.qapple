require("./bootstrap");
require("../js/section/sidebar-menu");

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Select2 plugin implementation
$(".select-all").on("click", function () {
    let $select2 = $(this).parent().siblings(".select2");
    $select2.find("option").prop("selected", "selected");
    $select2.trigger("change");
});

$(".deselect-all").on("click", function () {
    let $select2 = $(this).parent().siblings(".select2");
    $select2.find("option").prop("selected", "");
    $select2.trigger("change");
});
