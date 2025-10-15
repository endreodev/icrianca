(function ($) {
  /**
   * Init
   */

  let api_classes = $("input[name=api-req-classes]").val();
  let api_programs = $("input[name=api-req-programs]").val();
  let csrf_token = $("input[name=api-api-csrf_token]").val();

  /**
   * CONSTs
   */
  const UNITS = $("#units");
  const PROGRAMS = $("#programs");
  const CLASSES = $("#classes");

  var groupBy = function (xs, key) {
    return xs.reduce(function (rv, x) {
      (rv[x[key]] = rv[x[key]] || []).push(x);
      return rv;
    }, {});
  };

  var _units = [];
  var _programs = [];

  $("#units").on("select2:select", function (e) {
    var data = e.params.data;
    _units.push(data.id);

    selectClasses(_units, _programs);
  });

  $("#units").on("select2:unselect", function (e) {
    var data = e.params.data;
    var index = _units.indexOf(data.id);
    if (index !== -1) {
      _units.splice(index, 1);
    }

    selectClasses(_units, _programs);
  });

  $("#programs").on("select2:select", function (e) {
    var data = e.params.data;

    if (data.id === "all") {
      $("#programs").val("").trigger("change");
      $("#programs").val("all").trigger("change");

      _programs = ["all"];
    } else {
      var newArray = [];
      let newData = $.grep($("#programs").select2("data"), function (value) {
        return value["id"] != "all";
      });

      newData.forEach(function (data) {
        newArray.push(+data.id);
      });

      $("#programs").val(newArray).trigger("change");

      _programs.push(data.id);

      var index = _programs.indexOf("all");
      if (index !== -1) {
        _programs.splice(index, 1);
      }
    }

    selectClasses(_units, _programs);
  });

  $("#programs").on("select2:unselect", function (e) {
    var data = e.params.data;
    var index = _programs.indexOf(data.id);
    if (index !== -1) {
      _programs.splice(index, 1);
    }

    selectClasses(_units, _programs);
  });

  $("#classes").on("select2:select", function (e) {
    var data = e.params.data;

    if (data.id === "all") {
      $("#classes").val("").trigger("change");
      $("#classes").val("all").trigger("change");
    } else {
      var newArray = [];
      let newData = $.grep($("#classes").select2("data"), function (value) {
        return value["id"] != "all";
      });

      newData.forEach(function (data) {
        newArray.push(+data.id);
      });

      $("#classes").val(newArray).trigger("change");
    }
  });

  function getClasses($units, $programs) {
    return $.ajax({
      url: api_classes + "?units=" + $units + "&programs=" + $programs,
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": csrf_token,
        Authorization: csrf_token
      }
    });
  }

  function selectClasses($units, $programs) {
    getClasses($units, $programs).done(function (e) {
      console.log(e);

      console.log(e.length);

      CLASSES.empty();
      var options = "";

      if (e.length > 0) {
        options += '<option value="all">Todos</option>';
      } else {
        options += "<option disabled>Nenhum Encontrado</option>";
      }

      $.each(e, function (key, value) {
        options += '<option value="' + value.id + '">' + value.text + "</option>";
      });
      CLASSES.append(options);
      CLASSES.trigger("change");
    });
  }
})(jQuery);
