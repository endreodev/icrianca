(function ($) {
  "use strict";

  // MAterial Date picker
  $(".mdate").bootstrapMaterialDatePicker({
    weekStart: 0,
    time: false,
    format: "DD/MM/YYYY",
    cancelText: "Fechar",
    
    clearButton: true,
    clearText: "Limpar",
    lang: "pt-br",
  });
})(jQuery);
