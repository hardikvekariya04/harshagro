let map = L.map("map").setView([23.017054, 71.760498], 6);

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
      ? "<b>" + props.name + "</b><br />" + "Max temp:" + props.maxtemp + "°"
      : "Hover over a taluka");
};

info.addTo(map);

function getColor(d) {
  return d > 34
    ? "#990000"
    : d > 30
    ? "#d7301f"
    : d > 26
    ? "#ef6548"
    : d > 22
    ? "#fc8d59"
    : d > 18
    ? "#fdbb84"
    : d > 14
    ? "#fdd49e"
    : d > 10
    ? "#fee8c8"
    : "#fff7ec";
}
function style(feature) {
  return {
    fillColor: getColor(feature.properties.maxtemp),
    weight: 2.5,
    opacity: 0.8,
    color: "black",
    dashArray: "0",
    fillOpacity: 1,
  };
}

L.geoJson(talukaData, { style: style }).addTo(map);

function getLeafletElement(index) {
  return map._layers[index];
}

// let selectedElement = getLeafletElement(182);
function dropDownFeature(leafletId) {
  let selectedElement = getLeafletElement(leafletId);

  selectedElement.setStyle({
    // fillColor: "#666",
    // weight: 4,
    color: "#82fa39",
    dashArray: "1",
    fillOpacity: 0.8,
  });
  if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
    selectedElement.bringToFront();
  }
}

function highlightFeature(e) {
  var layer = e.target;

  console.log(layer["_leaflet_id"]);
  console.log(getLeafletElement(layer["_leaflet_id"]));

  layer.setStyle({
    fillColor: "#666",
    weight: 4,
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
  console.log(e.target)
  console.log(e.target.getBounds());
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

//DropdownCode--------------

// let distSel = document.getElementById("distsel");
// let ahmadabad = document.getElementById("1");

// distSel.addEventListener("change", (e) => {
//   if (e.target.selectedIndex === 0) {
//     map.setView([22.953841, 72.549866], 8.5);
//     dropDownFeature(182);
//   } else if (e.target.selectedIndex === 32) {
//     map.setView([22.167058, 71.669312], 8.5);
//     dropDownFeature(192);
//   } else if (e.target.selectedIndex === 1) {
//     map.setView([22.548074, 72.960205], 8.5);
//     dropDownFeature(201);
//   } else if (e.target.selectedIndex === 31) {
//     map.setView([21.76052, 72.146118], 8.5);
//     dropDownFeature(202);
//   } else if (e.target.selectedIndex === 28) {
//     map.setView([21.600236, 71.206787], 8.5);
//     dropDownFeature(176);
//   } else if (e.target.selectedIndex === 19) {
//     map.setView([22.714377, 71.640747], 8.5);
//     dropDownFeature(198);
//   } else if (e.target.selectedIndex === 6) {
//     map.setView([22.459771, 70.057617], 8.5);
//     dropDownFeature(204);
//   } else if (e.target.selectedIndex === 15) {
//     map.setView([21.630878, 69.619263], 8.5);
//     dropDownFeature(187);
//   } else if (e.target.selectedIndex === 24) {
//     map.setView([22.233175, 69.076538], 8.5);
//     dropDownFeature(205);
//   } else if (e.target.selectedIndex === 7) {
//     map.setView([21.522583, 70.468506], 8.5);
//     dropDownFeature(203);
//   } else if (e.target.selectedIndex === 16) {
//     map.setView([22.28808, 70.806885], 8.5);
//     dropDownFeature(199);
//   } else if (e.target.selectedIndex === 25) {
//     map.setView([22.821757, 70.828857], 8.5);
//     dropDownFeature(206);
//   } else if (e.target.selectedIndex === 14) {
//     map.setView([23.837611, 72.110962], 8.5);
//     dropDownFeature(179);
//   } else if (e.target.selectedIndex === 2) {
//     map.setView([24.328078, 72.139526], 8.5);
//     dropDownFeature(178);
//   } else if (e.target.selectedIndex === 27) {
//     map.setView([22.293163, 74.005005], 8.5);
//     dropDownFeature(193);
//   } else if (e.target.selectedIndex === 3) {
//     map.setView([21.697755, 73.023926], 8.5);
//     dropDownFeature(186);
//   } else if (e.target.selectedIndex === 22) {
//     map.setView([20.599365, 72.931366], 8.5);
//     dropDownFeature(174);
//   } else if (e.target.selectedIndex === 12) {
//     map.setView([20.93938, 72.932739], 8.5);
//     dropDownFeature(207);
//   } else if (e.target.selectedIndex === 18) {
//     map.setView([21.180826, 72.812988], 8.5);
//     dropDownFeature(189);
//   } else if (e.target.selectedIndex === 5) {
//     map.setView([23.224184, 72.644897], 8.5);
//     dropDownFeature(181);
//   } else if (e.target.selectedIndex === 4) {
//     map.setView([22.821757, 74.325146], 8.5);
//     dropDownFeature(184);
//   } else if (e.target.selectedIndex === 21) {
//     map.setView([22.282997, 73.196411], 8.5);
//     dropDownFeature(185);
//   } else if (e.target.selectedIndex === 10) {
//     map.setView([23.584126, 72.405396], 8.5);
//     dropDownFeature(180);
//   } else if (e.target.selectedIndex === 23) {
//     map.setView([21.0886, 73.506226], 8.5);
//     dropDownFeature(190);
//   } else if (e.target.selectedIndex === 20) {
//     map.setView([20.666967, 73.720734], 8.5);
//     dropDownFeature(177);
//   } else if (e.target.selectedIndex === 11) {
//     map.setView([21.722507, 73.687225], 8.5);
//     dropDownFeature(188);
//   } else if (e.target.selectedIndex === 13) {
//     map.setView([22.477982, 73.899193], 8.5);
//     dropDownFeature(183);
//   } else if (e.target.selectedIndex === 30) {
//     map.setView([23.216107, 73.819885], 8.5);
//     dropDownFeature(194);
//   } else if (e.target.selectedIndex === 26) {
//     map.setView([23.367471, 73.646851], 8.5);
//     dropDownFeature(191);
//   } else if (e.target.selectedIndex === 17) {
//     map.setView([23.775291, 73.287048], 8.5);
//     dropDownFeature(196);
//   } else if (e.target.selectedIndex === 29) {
//     map.setView([21.036314, 70.85852], 8.5);
//     dropDownFeature(195);
//   } else if (e.target.selectedIndex === 9) {
//     map.setView([23.040814, 73.235413], 8.5);
//     dropDownFeature(200);
//   } else if (e.target.selectedIndex === 8) {
//     map.setView([23.654588, 70.202637], 8.3);
//     dropDownFeature(197);
//   }
// });