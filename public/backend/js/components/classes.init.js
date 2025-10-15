(function ($) {
  function selectRefresh($item = null) {
    if ($item) {
      $($item).select2();
    } else {
      $(".select2").select2();
    }
  }
  /**
   * Initi Service Classes
   */
  const api_classes_units = $("input[name=api-classes-units]").val();
  const api_classes_program = $("input[name=api-classes-programs]").val();
  const api_classes_classes = $("input[name=api-classes-classes]").val();
  const api_schools = $("input[name=api-schools]").val();
  const csrf_token = $("input[name=csrf_token]").val();

  function getUnits() {
    return $.ajax({
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": csrf_token,
        Authorization: `Bearer ${csrf_token}`
      },
      url: api_classes_units
    });
  }
  function getSchools($ref = "") {
    return $.ajax({
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": csrf_token,
        Authorization: `Bearer ${csrf_token}`
      },
      url: api_schools + "/" + $ref
    });
  }
  function getPrograms($unit_id = "") {
    return $.ajax({
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": csrf_token,
        Authorization: `Bearer ${csrf_token}`
      },
      url: api_classes_program + "/" + $unit_id
    });
  }
  function getClasses($program_id = "", $unit_id = "") {
    return $.ajax({
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": csrf_token,
        Authorization: `Bearer ${csrf_token}`
      },
      url: api_classes_classes + "/" + $program_id + "/" + $unit_id
    });
  }

  getUnits().done(function (e) {
    // console.log(e);
  });

  $(document).ready(function () {
    $(this).find("select[name^=registrations_unit_id]").trigger("change");

    setTimeout(() => {
      selectRefresh();
    }, 1500);
  });

  $(document).on("change", "select[name^=registrations_unit_id]", function (e) {
    e.preventDefault();
    let element = $(this).closest(".--item");
    let registrations_unit_id = element.find("select[name^=registrations_unit_id]");
    let registrations_program_id = element.find("select[name^=registrations_program_id]");
    // let registrations_classe_id = element.find('select[name^=registrations_classe_id]');

    let value = $(this).attr("data-old");

    let isOld = value ? true : false;

    if (!value) {
      value = $(this).val();
    }

    $(this).val(value);
    // $(this).select2().val(value);

    // selectRefresh(registrations_unit_id);

    getPrograms(value).done(function (e) {
      registrations_program_id.empty();
      var options = "";

      options += !isOld ? "<option selected disabled>Selecione</option>" : "";
      $.each(e, function (key, value) {
        options += '<option value="' + value.id + '">' + value.name + "</option>";
      });
      registrations_program_id.append(options);
      registrations_program_id.trigger("change");

      registrations_unit_id.removeAttr("data-old");
      selectRefresh();
    });
  });

  $(document).on("change", "select[name^=schools_teaching]", function (e) {
    e.preventDefault();

    let element = $(this).closest(".--item");
    let schools_school_year = element.find("select[name^=schools_school_year]");

    let value = $(this).attr("data-old");
    let isOld = value ? true : false;

    if (!value) {
      value = $(this).val();
    }

    getSchools(value).done(function (e) {
      schools_school_year.empty();
      var options = "";

      if (e.length > 0) {
        options += !isOld ? "<option selected disabled>Selecione</option>" : "";
      } else {
        options += "<option selected disabled>Nenhum item encontrado</option>";
      }

      $.each(e, function (key, value) {
        options += '<option value="' + value.id + '">' + value.name + "</option>";
      });
      schools_school_year.append(options);

      let value = schools_school_year.attr("data-old");
      if (!value) {
        value = $(schools_school_year).val();
      }

      $(schools_school_year).val(value);

      schools_school_year.trigger("change");

      schools_school_year.removeAttr("data-old");

      selectRefresh();
    });
  });

  $(document).on("change", "select[name^=registrations_program_id]", function (e) {
    e.preventDefault();
    let element = $(this).closest(".--item");
    let registrations_program_id = element.find("select[name^=registrations_program_id]");
    let registrations_classe_id = element.find("select[name^=registrations_classe_id]");
    let registrations_unit_id = element.find("select[name^=registrations_unit_id]");

    let value = $(this).attr("data-old");
    let isOld = value ? true : false;

    if (!value) {
      value = $(this).val();
    }

    $(this).val(value);
    // registrations_program_id.val(value);
    // selectRefresh(registrations_program_id);

    let unit_id = parseInt(registrations_unit_id.val())
      ? registrations_unit_id.val()
      : registrations_unit_id.closest(".form-group").find(".select2-container--default").data("select2-id");

    getClasses(value, unit_id).done(function (e) {
      registrations_classe_id.empty();
      var options = "";

      if (e.length > 0) {
        options += !isOld ? "<option selected disabled>Selecione</option>" : "";
      } else {
        options += "<option selected disabled>Nenhum item encontrado</option>";
      }

      $.each(e, function (key, value) {
        options += '<option value="' + value.id + '">' + value.name + "</option>";
      });
      registrations_classe_id.append(options);

      let value = registrations_classe_id.attr("data-old");
      if (!value) {
        value = $(registrations_classe_id).val();
      }

      $(registrations_classe_id).val(value);

      registrations_classe_id.trigger("change");

      registrations_program_id.removeAttr("data-old");

      selectRefresh();
    });
  });

  // $("select[name^=registrations_unit_id]").change(function (e) {
  //   alert("aaa");
  //   let content = $(this).closest('.--item');
  //   console.log(content);
  // });
})(jQuery);
