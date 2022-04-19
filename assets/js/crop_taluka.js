var path = "http://localhost/newagro/pages/";
var t_id = '';
var date_id = '';
var temp_id = '';
var per_id = '';
var $district = $('#district'),
  $taluka = $('#taluka'),
  $options = $taluka.find('option');

$district.on('change', function () {
  $taluka.html($options.filter('[value="' + this.value + '"]'));
}).trigger('change');

var week = document.getElementById("weeks").value;
fetch_data();
var year = document.getElementById("years").value;
fetch_data();
var per_id = document.getElementById("type").value;
fetch_data();
var period_id = document.getElementById("per").value;
fetch_data();

$(function () {
  $(document).on('change', '#taluka', function () {
    t_id = $(this).children(":selected").attr("id");
    fetch_data();
  })
  $(document).on('change', '#weeks', function () {
    week = $(this).val();
    fetch_data();
  })
  $(document).on('change', '#years', function () {
    year = $(this).val();
    fetch_data();
  })
  $(document).on('change', '#type', function () {
    per_id = $(this).val();
    fetch_data();
  })
  $(document).on('change', '#per', function () {
    period_id = $(this).val();
    fetch_data();
  })
});

function fetch_data() {
  $.ajax({
    url: path + "crop_taluka_fetch_data.php",
    type: 'post',
    data: { t_id: t_id, week: week, year: year, per_id: per_id },
    success: function (result) {
      result = JSON.parse(result); 
      update_chart(result);
    },
  })
  $.ajax({
    url: path + "crop_taluka_fetch_bar_data.php",
    type: 'post',
    data: { t_id: t_id, week: week, year: year, per_id: per_id, period_id: period_id },
    success: function (result1) {
      result1 = JSON.parse(result1);
      update_chart1(result1);
    }
  });
}
function update_chart(result) {
  $("canvas#chart-line").remove();
  $("div#chart_data").append('<canvas id="chart-line" class="chart-canvas" height="270" width="300"></canvas>');
  var ctx2 = document.getElementById("chart-line").getContext("2d");
  new Chart(ctx2, {
    type: "line",
    data: {
      labels: result.final_array,
      datasets: [{
        label: `${per_id}` + ` ` + `Temp`,
        tension: 0,
        borderWidth: 0,
        pointRadius: 5,
        pointBackgroundColor: "rgba(000, 000, 000, .8)",
        pointBorderColor: "transparent",
        borderColor: "rgba(000, 000, 000, .8)",
        borderColor: "rgba(000, 000, 000, .8)",
        borderWidth: 4,
        backgroundColor: "transparent",
        fill: true,
        data: result.month_final,
        maxBarThickness: 6

      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: true,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: 'rgba(000, 000, 000, .2)'
          },
          ticks: {
            display: true,
            color: '#000',
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#000',
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });
}

function update_chart1(result1) {
  $("canvas#chart-bars").remove();
  $("div#chart_data1").append('<canvas id="chart-bars" class="chart-canvas" height="280" width="300"></canvas>');
  var ctx = document.getElementById("chart-bars").getContext("2d");
  new Chart(ctx, {
    type: "bar",
    data: {
      labels: result1.date_array,
      datasets: [{
        label: `${per_id}` + ` ` + `Temp`,
        tension: 0,
        borderWidth: 0,
        borderRadius: 5,
        borderSkipped: false,
        backgroundColor: "rgba(000, 000, 000, .8)",
        data: result1.yearly_month_array,
        maxBarThickness: 6
      },],
    },

    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: true,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: 'rgba(000, 000, 000, .2)'
          },
          ticks: {
            suggestedMin: 0,
            suggestedMax: 500,
            beginAtZero: true,
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
            color: "#000"
          },
        },
        x: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: 'rgba(000, 000, 000, .2)'
          },
          ticks: {
            display: true,
            color: '#000',
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });

}