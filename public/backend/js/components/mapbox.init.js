(function ($) {
  /**
   * Variables
   */
  const MAPBOX_TOKEN = "pk.eyJ1IjoibGVsZWNvYnIiLCJhIjoiY2tpMHlqaDVnMTdzZTJ4bm15b20yejlvMyJ9.R_ZdY6EmF5gWVpfMuaYOBw";

  // CENTER
  const MAPBOX_CENTER = [_LNG ? _LNG : -15.65, _LAT ? _LAT : -56.0737];

  // ARRAY MARKS 
  const MAP_MARKERS_ARR = new Array();
  // let MAP_MARKERS_ARR = new Array();

  // URLs
  const API_SERACH_REGION = $("input[name=api-region-search]").val();
  const API_MAPBOX_SEARCH = "https://api.mapbox.com/geocoding/v5/mapbox.places/";

  mapboxgl.accessToken = MAPBOX_TOKEN;
  const map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/mapbox/streets-v11",
    center: MAPBOX_CENTER,
    zoom: 13
  });

  const geocoder = new MapboxGeocoder({
    mapboxgl: mapboxgl,
    accessToken: mapboxgl.accessToken,
    marker: false
  });

  /**
   * Functions
   */

  // Set Latitute and lngitute
  function setLatLng(latLng, element) {
    $(element).val(latLng);
  }

  // Search api Region parms
  function apiSearchRegion(parms) {
    let query = "";
    let url = "";
    if (Array.isArray(parms)) {
      parms.forEach(function (value, index) {
        if (value) {
          query += value + "/";
        }
      });
    } else {
      query += parms;
    }

    url = API_SERACH_REGION + "/" + query;

    return $.ajax({
      url: url
    });
  }

  // Search api Mapbox
  function apiSearchMapbox(parms) {
    let url = "";
    let query = "";
    parms.forEach(function (value, index) {
      if (value) {
        query += value + (parms.length - 1 === index ? "" : ",");
      }
    });

    url = API_MAPBOX_SEARCH + query + ".json?types=address&access_token=" + MAPBOX_TOKEN;

    return $.ajax({
      url: url
    });
  }

  /**
   * ADD MARK EXISTING
   */

  if (_LAT && _LNG) {
    if (MAP_MARKERS_ARR !== null) {
      for (var i = MAP_MARKERS_ARR.length - 1; i >= 0; i--) {
        MAP_MARKERS_ARR[i].remove();
      }
    }

    const marker3 = new mapboxgl.Marker({
      draggable: true
    })
      .setLngLat([_LNG, _LAT])
      .addTo(map);

    MAP_MARKERS_ARR.push(marker3);

    marker3.on("dragend", function (e) {
      var lngLat = e.target.getLngLat();

      apiSearchMapbox([lngLat["lng"], lngLat["lat"]]).done(function (e) {
        let result = e.features[0];
        let full_address = result.place_name.split(",");

        if (full_address[0]) {
          $(address).val(full_address[0]);
        }
        if (full_address[1]) {
          $(district).val(full_address[1]);
        }
        if (full_address[2]) {
          let city_state = full_address[2].split("-");
          apiSearchRegion([city_state[0], city_state[1]]).done(function (e) {
            $(select_countries).attr("data-old", e[0].country_id);
            $(select_states).attr("data-old", e[0].state_id);
            $(select_cities).attr("data-old", e[0].city_id);

            setTimeout(() => {
              $(select_countries).trigger("change");
            }, 500);
          });
        }
        if (full_address[3]) {
          if (full_address[3] !== "Brazil") {
            $(zipcode).val(full_address[3]);
          }
        }
      });
    });
  }

  /**
   * Geocode
   */
  geocoder.on("result", (e) => {
    let result = e.result;
    let context = result.context;
    let obj = {};

    /**
     * Create context
     */
    Object.entries(context).forEach(([key, value]) => {
      let id = value.id.split(".")[0];
      let text = value.text;
      obj[id] = {
        text: text
      };
    });

    /**
     * SetLatLng
     */
    if (result.center.length > 0) {
      setLatLng(result.center[0], "input[name=lat]");
      setLatLng(result.center[1], "input[name=lng]");
    }

    /**
     * Set Country, State and City inner search API.
     */
    if (Object.keys(obj).length > 0) {
      if (obj.place.text && obj.region.text) {
        apiSearchRegion([obj.place.text, obj.region.text]).done(function (e) {
          $(select_countries).attr("data-old", e[0].country_id);
          $(select_states).attr("data-old", e[0].state_id);
          $(select_cities).attr("data-old", e[0].city_id);

          setTimeout(() => {
            $(select_countries).trigger("change");
          }, 500);
        });
      }
      if (obj.neighborhood.text) {
        $(district).val(obj.neighborhood.text);
      }
      if (obj.postcode.text) {
        $(zipcode).val(obj.postcode.text);
      }
    }

    /**
     * Set Address
     */
    if (result["text_pt-BR"]) {
      $(address).val(result["text_pt-BR"]);
    }

    /**
     * Prevent inner double Maker
     */
    if (MAP_MARKERS_ARR !== null) {
      for (var i = MAP_MARKERS_ARR.length - 1; i >= 0; i--) {
        MAP_MARKERS_ARR[i].remove();
      }
    }

    const marker = new mapboxgl.Marker({
      draggable: true
    })
      .setLngLat(e.result.center)
      .addTo(map);

    /**
     * Add Mark in Array
     */
    MAP_MARKERS_ARR.push(marker);

    marker.on("dragend", function (e) {
      var lngLat = e.target.getLngLat();

      apiSearchMapbox([lngLat["lng"], lngLat["lat"]]).done(function (e) {
        let result = e.features[0];
        let full_address = result.place_name.split(",");

        if (full_address[0]) {
          $(address).val(full_address[0]);
        }
        if (full_address[1]) {
          $(district).val(full_address[1]);
        }
        if (full_address[2]) {
          let city_state = full_address[2].split("-");
          apiSearchRegion([city_state[0], city_state[1]]).done(function (e) {
            $(select_countries).attr("data-old", e[0].country_id);
            $(select_states).attr("data-old", e[0].state_id);
            $(select_cities).attr("data-old", e[0].city_id);

            setTimeout(() => {
              $(select_countries).trigger("change");
            }, 500);
          });
        }
        if (full_address[3]) {
          if (full_address[3] !== "Brazil") {
            $(zipcode).val(full_address[3]);
          }
        }
      });
    });
  });
  map.addControl(geocoder);

  map.on("click", function (e) {
    if (MAP_MARKERS_ARR !== null) {
      for (var i = MAP_MARKERS_ARR.length - 1; i >= 0; i--) {
        MAP_MARKERS_ARR[i].remove();
      }
    }

    const marker3 = new mapboxgl.Marker({
      draggable: true
    })
      .setLngLat([e.lngLat.lng, e.lngLat.lat])
      .addTo(map);

      setLatLng(e.lngLat.lat, "input[name=lat]");
      setLatLng(e.lngLat.lng, "input[name=lng]");

    marker3.on("dragend", function (e) {
      var lngLat = e.target.getLngLat();
      setLatLng(lngLat["lat"], "input[name=lat]");
      setLatLng(lngLat["lng"], "input[name=lng]");
    });

    console.log(e);

    apiSearchMapbox([e.lngLat.lng, e.lngLat.lat]).done(function (e) {
      let result = e.features[0];
      let full_address = result.place_name.split(",");
      console.log(full_address);

      if (full_address[0]) {
        $(address).val(full_address[0]);
      }
      if (full_address[1]) {
        $(district).val(full_address[1]);
      }
      if (full_address[2]) {
        let city_state = full_address[2].split("-");
        apiSearchRegion([city_state[0], city_state[1]]).done(function (e) {
          $(select_countries).attr("data-old", e[0].country_id);
          $(select_states).attr("data-old", e[0].state_id);
          $(select_cities).attr("data-old", e[0].city_id);

          setTimeout(() => {
            $(select_countries).trigger("change");
          }, 500);
        });
      }
      if (full_address[3]) {
        $(zipcode).val(full_address[3]);
      }
    });

    MAP_MARKERS_ARR.push(marker3);
  });

  /**
   * Initi Service Regions
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
                    setLatLng(lngLat["lng"], "input[name=lng]");
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
