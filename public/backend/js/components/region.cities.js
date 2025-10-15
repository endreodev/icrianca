(function ($) {
  /**
   * Initi Service Regions Users
   */
  const api_countries = $("input[name=api-region-countries]").val();
  const api_states = $("input[name=api-region-states]").val();
  const api_cities = $("input[name=api-region-cities]").val();
  const api_search = $("input[name=api-region-search]").val();

  const select_countries = $("#select_countries");
  const select_states = $("#select_states");

  function getCountries() {
    return $.ajax({
      url: api_countries
    });
  }

  function getStates(country) {
    return $.ajax({
      url: api_states + "/" + country
    });
  }

  getCountries().done(function (e) {
    select_countries.empty();
    var options = "";

    $.each(e, function (key, value) {
      options += '<option value="' + value.id + '">' + value.name + "</option>";
    });
    select_countries.append(options);

    let old_country = select_countries.data("old");

  
    if (!old_country) {
      old_country = $(select_countries).val();
    }
    select_countries.val(old_country);
    
    select_countries.trigger("change");
  });

  select_countries.change(function (e) {
    e.preventDefault();

    let value = select_countries.attr("data-old");

    if (!value) {
      value = $(this).val();
    }

    select_countries.val(value);
    select_countries.data;

    getStates(value).done(function (e) {
      select_states.empty();
      var options = "";

      $.each(e, function (key, value) {
        options += '<option value="' + value.id + '">' + value.name + "</option>";
      });
      select_states.append(options);
      select_states.trigger("change");

      select_countries.removeAttr("data-old");
    });
  });

  select_states.change(function (e) {
    e.preventDefault();

    let value = select_states.attr("data-old");

    if (!value) {
      value = $(this).val();
    }

    select_states.val(value);
  });
})(jQuery);
