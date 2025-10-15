/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_mapbox__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/mapbox */ "./resources/js/modules/mapbox.js");
/* harmony import */ var _modules_mapbox__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_modules_mapbox__WEBPACK_IMPORTED_MODULE_0__);
// require('./bootstrap');


/***/ }),

/***/ "./resources/js/modules/mapbox.js":
/*!****************************************!*\
  !*** ./resources/js/modules/mapbox.js ***!
  \****************************************/
/***/ (() => {

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"]; if (_i == null) return; var _arr = []; var _n = true; var _d = false; var _s, _e; try { for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

(function ($) {
  /**
   * Variables
   */
  var MAPBOX_TOKEN = "pk.eyJ1IjoibGVsZWNvYnIiLCJhIjoiY2tpMHlqaDVnMTdzZTJ4bm15b20yejlvMyJ9.R_ZdY6EmF5gWVpfMuaYOBw"; // CENTER

  var MAPBOX_CENTER = [-56.0737, -15.65]; // ARRAY MARKS

  var MAP_MARKERS_ARR = new Array(); // let MAP_MARKERS_ARR = new Array();
  // URLs

  var API_SERACH_REGION = $("input[name=api-region-search]").val();
  var API_MAPBOX_SEARCH = "https://api.mapbox.com/geocoding/v5/mapbox.places/";
  mapboxgl.accessToken = MAPBOX_TOKEN;
  var map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/mapbox/streets-v11",
    center: MAPBOX_CENTER,
    zoom: 13
  });
  var geocoder = new MapboxGeocoder({
    mapboxgl: mapboxgl,
    accessToken: mapboxgl.accessToken,
    marker: false
  });
  /**
   * Functions
   */
  // Set Latitute and longitute

  function setLatLng(latLng, element) {
    $(element).val(latLng);
  } // Search api Region parms


  function apiSearchRegion(parms) {
    var query = "";
    var url = "";

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
  } // Search api Mapbox


  function apiSearchMapbox(parms) {
    var url = "";
    var query = "";
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
   * Geocode
   */


  geocoder.on("result", function (e) {
    var result = e.result;
    var context = result.context;
    var obj = {};
    /**
     * Create context
     */

    Object.entries(context).forEach(function (_ref) {
      var _ref2 = _slicedToArray(_ref, 2),
          key = _ref2[0],
          value = _ref2[1];

      var id = value.id.split(".")[0];
      var text = value.text;
      obj[id] = {
        text: text
      };
    });
    /**
     * SetLatLng
     */

    if (result.center.length > 0) {
      setLatLng(result.center[0], "input[name=lat]");
      setLatLng(result.center[1], "input[name=long]");
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
          setTimeout(function () {
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

    var marker = new mapboxgl.Marker({
      draggable: true
    }).setLngLat(e.result.center).addTo(map);
    /**
     * Add Mark in Array
     */

    MAP_MARKERS_ARR.push(marker);
    marker.on("dragend", function (e) {
      var lngLat = e.target.getLngLat();
      apiSearchMapbox([lngLat["lng"], lngLat["lat"]]).done(function (e) {
        var result = e.features[0];
        var full_address = result.place_name.split(",");

        if (full_address[0]) {
          $(address).val(full_address[0]);
        }

        if (full_address[1]) {
          $(district).val(full_address[1]);
        }

        if (full_address[2]) {
          var city_state = full_address[2].split("-");
          apiSearchRegion([city_state[0], city_state[1]]).done(function (e) {
            $(select_countries).attr("data-old", e[0].country_id);
            $(select_states).attr("data-old", e[0].state_id);
            $(select_cities).attr("data-old", e[0].city_id);
            setTimeout(function () {
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

    var marker3 = new mapboxgl.Marker({
      draggable: true
    }).setLngLat([e.lngLat.lng, e.lngLat.lat]).addTo(map);
    marker3.on("dragend", function (e) {
      var lngLat = e.target.getLngLat();
      setLatLng(lngLat["lat"], "input[name=lat]");
      setLatLng(lngLat["lng"], "input[name=long]");
    });
    console.log(e);
    apiSearchMapbox([e.lngLat.lng, e.lngLat.lat]).done(function (e) {
      var result = e.features[0];
      var full_address = result.place_name.split(",");

      if (full_address[0]) {
        $(address).val(full_address[0]);
      }

      if (full_address[1]) {
        $(district).val(full_address[1]);
      }

      if (full_address[2]) {
        var city_state = full_address[2].split("-");
        apiSearchRegion([city_state[0], city_state[1]]).done(function (e) {
          $(select_countries).attr("data-old", e[0].country_id);
          $(select_states).attr("data-old", e[0].state_id);
          $(select_cities).attr("data-old", e[0].city_id);
          setTimeout(function () {
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

  var api_countries = $("input[name=api-region-countries]").val();
  var api_states = $("input[name=api-region-states]").val();
  var api_cities = $("input[name=api-region-cities]").val();
  var api_search = $("input[name=api-region-search]").val();
  var select_countries = $("#select_countries");
  var select_states = $("#select_states");
  var select_cities = $("#select_cities");
  var zipcode = $("input[name=zipcode]");
  var address = $("input[name=address]");
  var number = $("input[name=number]");
  var district = $("input[name=district]");

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
    var value = select_countries.attr("data-old");

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
    var value = select_states.attr("data-old");

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
    var value = select_cities.attr("data-old");

    if (!value) {
      value = $(this).val();
    }

    select_cities.val(value);
    select_cities.removeAttr("data-old");
  });
  var options = {
    onComplete: function onComplete(cep) {
      $.ajax({
        type: "GET",
        url: "https://viacep.com.br/ws/" + cep + "/json/",
        success: function success(e) {
          console.log(e);

          if (!e.error) {
            address.val(e.logradouro ? e.logradouro : address.data("old"));
            number.val(e.numero ? e.numero : number.data("old"));
            district.val(e.bairro ? e.bairro : district.data("old"));

            if (e.localidade) {
              $.ajax({
                url: api_search + "/" + e.localidade + "/" + e.uf,
                success: function success(e) {
                  select_countries.attr("data-old", e[0].country_id);
                  select_states.attr("data-old", e[0].state_id);
                  select_cities.attr("data-old", e[0].city_id);
                  setTimeout(function () {
                    select_countries.trigger("change");
                  }, 500);
                }
              });
            }

            if (e.logradouro || e.localidade) {
              apiSearchMapbox([e.logradouro, e.localidade]).done(function (e) {
                var map_content = $("#map");

                if (map_content.length > 0) {
                  if (MAP_MARKERS_ARR !== null) {
                    for (var i = MAP_MARKERS_ARR.length - 1; i >= 0; i--) {
                      MAP_MARKERS_ARR[i].remove();
                    }
                  }

                  var marker = new mapboxgl.Marker({
                    draggable: true
                  }).setLngLat(e.features[0].center).addTo(map);
                  map.setCenter(e.features[0].center);
                  MAP_MARKERS_ARR.push(marker);
                  marker.on("dragend", function (e) {
                    console.log(e.target.getL);
                    var lngLat = e.target.getLngLat();
                    apiSearchMapbox([lngLat["lng"], lngLat["lat"]]).done(function (e) {
                      var result = e.features[0];
                      var full_address = result.place_name.split(",");

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
                        var city_state = full_address[2].split("-");
                        $.ajax({
                          url: $("input[name=api-region-search]").val() + "/" + city_state[0] + "/" + city_state[1],
                          success: function success(e) {
                            $(select_countries).attr("data-old", e[0].country_id);
                            $(select_states).attr("data-old", e[0].state_id);
                            $(select_cities).attr("data-old", e[0].city_id);
                            setTimeout(function () {
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

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/sass/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;