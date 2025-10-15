const API_SERACH_REGION = $("input[name=api-region-search]").val();
const API_MAPBOX_SEARCH = "https://api.mapbox.com/geocoding/v5/mapbox.places/";

// Set Latitute and longitute
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

export default { setLatLng, apiSearchRegion, apiSearchMapbox };
