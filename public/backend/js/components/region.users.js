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
  const select_cities = $("#select_cities");

  const zipcode = $("input[name=zipcode]");
  const address = $("input[name=address]");
  const number = $("input[name=number]");
  const district = $("input[name=district]");

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

  function getCities(state) {
    return $.ajax({
      url: api_cities + "/" + state
    });
  }

  getCountries().done(function (e) {
    select_countries.empty();
    var options = "";

    $.each(e, function (key, value) {
      options += '<option value="' + value.id + '">' + value.name + "</option>";
    });
    select_countries.append(options);
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

    getCities(value).done(function (e) {
      select_cities.empty();
      var options = "";

      $.each(e, function (key, value) {
        options += '<option value="' + value.id + '">' + value.name + "</option>";
      });
      select_cities.append(options);
      select_cities.trigger("change");

      select_states.removeAttr("data-old");
    });
  });

  select_cities.change(function (e) {
    e.preventDefault();

    let value = select_cities.attr("data-old");

    if (!value) {
      value = $(this).val();
    }

    select_cities.val(value);
    select_cities.removeAttr("data-old");
  });

  var options = {
    onComplete: function (cep) {
      $.ajax({
        type: "GET",
        url: "https://viacep.com.br/ws/" + cep + "/json/",
        success: function (e) {
          console.log(e);

          if (!e.error) {
            address.val(e.logradouro ? e.logradouro : address.data("old"));
            number.val(e.numero ? e.numero : number.data("old"));
            district.val(e.bairro ? e.bairro : district.data("old"));

            if (e.localidade) {
              $.ajax({
                url: api_search + "/" + e.localidade + "/" + e.uf,
                success: function (e) {
                  select_countries.attr("data-old", e[0].country_id);
                  select_states.attr("data-old", e[0].state_id);
                  select_cities.attr("data-old", e[0].city_id);

                  setTimeout(() => {
                    select_countries.trigger("change");
                  }, 500);
                }
              });
            }

            if (e.logradouro || e.localidade) {
              apiSearchMapbox([e.logradouro, e.localidade]).done(function (e) {
                let map_content = $("#map");

                if (map_content.length > 0) {
                  if (MAP_MARKERS_ARR !== null) {
                    for (var i = MAP_MARKERS_ARR.length - 1; i >= 0; i--) {
                      MAP_MARKERS_ARR[i].remove();
                    }
                  }

                  const marker = new mapboxgl.Marker({
                    draggable: true
                  })
                    .setLngLat(e.features[0].center)
                    .addTo(map);

                  map.setCenter(e.features[0].center);
                  MAP_MARKERS_ARR.push(marker);

                  marker.on("dragend", function (e) {
                    console.log(e.target.getL);
                    var lngLat = e.target.getLngLat();

                    apiSearchMapbox([lngLat["lng"], lngLat["lat"]]).done(function (e) {
                      let result = e.features[0];

                      let full_address = result.place_name.split(",");

                      if (full_address[0]) {
                        $("#address").val(full_address[0]);
                      }

                      if (full_address[1]) {
                        $("#district").val(full_address[1]);
                      }
                      if (full_address[3]) {
                        if (full_address[3] !== "Brazil") {
                          $("#zipcode").val(full_address[3]);
                        }
                      }
                      if (full_address[2]) {
                        let city_state = full_address[2].split("-");

                        $.ajax({
                          url: $("input[name=api-region-search]").val() + "/" + city_state[0] + "/" + city_state[1],
                          success: function (e) {
                            $(select_countries).attr("data-old", e[0].country_id);
                            $(select_states).attr("data-old", e[0].state_id);
                            $(select_cities).attr("data-old", e[0].city_id);

                            setTimeout(() => {
                              $(select_countries).trigger("change");
                            }, 500);
                          }
                        });
                      }
                    });
                    setLatLng(lngLat["lat"], "input[name=lat]");
                    setLatLng(lngLat["lng"], "input[name=long]");
                  });
                }
              });
            }
          }
        }
      });
    }
  };
  $(".cep_with_callback").mask("00000-000", options);
})(jQuery);
