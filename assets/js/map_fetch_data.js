var path = "http://localhost/newagro/";
var taluka_id ='';
var date_id = '';
$(function(){

    $(document).on('change','#date',function(){
        date_id = $(this).val();
        // console.log(taluka_id);
        fetch_data1();
    })
});
function fetch_data1(){
    $.ajax({
        url: path +"map_fetch_data.php"  ,
        type: 'post',
        data: { date_id: date_id},
        success: function (result) {
            result = JSON.parse(result);
            console.log(result.taluka_id);  
            console.log(result.month);
            // document.write(result.coodinate);  
            // document.write(result.final_array);  
            generate_map(result);  
        }
    });
    }

function generate_map(result){
    // document.write(result.coodinate);
    let talukaData ={
        type: "FeatureCollection",
        features: [
          {
            type: "Feature",
            id: result.taluka_id,
            properties: {
              name: "Ahmedabad",
              density: 18,
              rainfall: result.month,
              
            },
            geometry: {
                type: "Polygon",
                coordinates:[
                 [[{"lat":result.lat , "lng":result.lng}]]
                ],
              },
          }
            ],
        };
        let map = L.map("map").setView([23.017054, 71.760498], 7.3);

L.tileLayer(
  "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmlraGlsbW90d2FuaTUiLCJhIjoiY2t5cmFhYnR5MHJ4NzJ2bzd1NHhlbGtsNiJ9.WrJN5gd8bmtsdA2af0iMvw",
  {
    maxZoom: 18,
    id: "mapbox/light-v9",

    tileSize: 512,
    zoomOffset: -1,
  }
).addTo(map);

console.log();

L.geoJson(talukaData).addTo(map);

var info = L.control();

info.onAdd = function (map) {
  this._div = L.DomUtil.create("div", "info");
  this.update();
  return this._div;
};

info.update = function (props) {
  this._div.innerHTML =
    "<h4>Temperature data</h4>" +
    (props
      ? "<b>" + props.name + "</b><br />" + "Rain fall:" + props.rainfall 
      : "Hover over a taluka");
};

info.addTo(map);

function getColor(d) {
  return d > 34
    ? "#1E3F66"
    : d > 30
    ? "#2E5984"
    : d > 26
    ? "#528AAE"
    : d > 22
    ? "#73A5C6"
    : d > 18
    ? "#91BAD6"
    : d > 14
    ? "#BCD2E8"
    : d > 10
    ? "#fee8c8"
    : "#fff7ec";
}
function style(feature) {
  return {
    fillColor: getColor(feature.properties.rainfall),
    weight: 2.5,
    opacity: 0.8,
    color: "black",
    dashArray: "0",
    fillOpacity: 1,
  };
}

L.geoJson(talukaData, { style: style }).addTo(map);

function highlightFeature(e) {
  var layer = e.target;

  layer.setStyle({
    weight: 4,
    fillColor:"#666",
    color: "black",
    dashArray: "1",
    fillOpacity: 0.8,
  });

  if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
    layer.bringToFront();
  }

  info.update(layer.feature.properties);
}

var geojson;

function resetHighlight(e) {
  geojson.resetStyle(e.target);
  info.update();
}

function zoomToFeature(e) {
  map.fitBounds(e.target.getBounds());
}

function onEachFeature(feature, layer) {
  layer.on({
    mouseover: highlightFeature,
    mouseout: resetHighlight,
    click: zoomToFeature,
  });
}

/* global statesData */
geojson = L.geoJson(talukaData, {
  style: style,
  onEachFeature: onEachFeature,
}).addTo(map);

var legend = L.control({ position: "bottomright" });

legend.onAdd = function (map) {
  var div = L.DomUtil.create("div", "info legend");
  var grades = [0, 10, 14, 18, 22, 26, 30, 34];
  var labels = [];
  var from, to;

  for (var i = 0; i < grades.length; i++) {
    from = grades[i];
    to = grades[i + 1];

    labels.push(
      '<i style="background:' +
        getColor(from + 1) +
        '"></i> ' +
        from +
        (to ? "&ndash;" + to : "+")
    );
  }

  div.innerHTML = labels.join("<br>");
  return div;
};

legend.addTo(map);
    }
// generate_map(resu);
