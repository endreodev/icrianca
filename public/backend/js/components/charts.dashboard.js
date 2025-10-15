(function ($) {
  "use strict";

  var dzSparkLine = (function () {
    var chartBar = function () {
      var optionsArea = {
        series: [
          {
            name: "Alunos",
            data: []
          }
        ],
        chart: {
          height: 200,
          type: "area",
          group: "social",
          toolbar: {
            show: false
          },
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: [10],
          colors: ["#0B2A97"],
          curve: "smooth"
        },
        legend: {
          show: false,
          tooltipHoverFormatter: function (val, opts) {
            return val + " - " + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + "";
          }
        },
        markers: {
          strokeWidth: [8],
          strokeColors: ["#0B2A97"],
          border: 0,
          colors: ["#fff"],
          hover: {
            size: 13
          }
        },
        xaxis: {
          // categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
          labels: {
            style: {
              colors: "#3E4954",
              fontSize: "14px",
              fontFamily: "Poppins",
              fontWeight: 100
            }
          }
        },
        yaxis: {
          labels: {
            offsetX: -16,
            style: {
              colors: "#3E4954",
              fontSize: "14px",
              fontFamily: "Poppins",
              fontWeight: 100
            }
          }
        },
        fill: {
          colors: ["#0B2A97"],
          type: "solid",
          opacity: 0
        },
        colors: ["#0B2A97"],
        grid: {
          borderColor: "#f1f1f1",
          xaxis: {
            lines: {
              show: true
            }
          }
        },
        responsive: [
          {
            breakpoint: 1601,
            options: {
              chart: {
                height: 400
              }
            }
          },
          {
            breakpoint: 768,
            options: {
              chart: {
                height: 250
              },
              markers: {
                strokeWidth: [4],
                strokeColors: ["#0B2A97"],
                border: 0,
                colors: ["#fff"],
                hover: {
                  size: 6
                }
              },
              stroke: {
                width: [6],
                colors: ["#0B2A97"],
                curve: "smooth"
              }
            }
          }
        ]
      };
      var chartArea = new ApexCharts(document.querySelector("#chartBar"), optionsArea);
      chartArea.render();

      let url = $("input[name=api-dashboard-event]").val();
      let csrf_token = $("input[name=api-api-csrf_token]").val();

      $.ajaxSetup({
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": csrf_token,
          Authorization: csrf_token
        }
      });
      $.getJSON(url, function (response) {
        console.log(response);

        chartArea.updateSeries([
          {
            name: "Alunos",
            data: response
          }
        ]);
      });
    };

    var pieChart = function () {
      //pie chart
      if (jQuery("#pie_chart").length > 0) {
        //pie chart
        const pie_chart = document.getElementById("pie_chart").getContext("2d");
        // pie_chart.height = 100;
        const pieChartSex = new Chart(pie_chart, {
          type: "pie",
          data: {
            defaultFontFamily: "Poppins",
            datasets: [
              {
                data: [10, 12],
                borderWidth: 0,
                backgroundColor: ["rgba(11, 42, 151, .9)", "rgba(249, 2, 173, .7)"],
                hoverBackgroundColor: ["rgba(11, 42, 151, .9)", "rgba(255, 0, 177, .7)"]
              }
            ],
            labels: ["Masculino", "Feminino"]
          },
          options: {
            responsive: true,
            legend: false,
            maintainAspectRatio: false
          }
        });

        let url_sex = $("input[name=api-dashboard-event-sex]").val();
        let csrf_token = $("input[name=api-api-csrf_token]").val();

        $.ajaxSetup({
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrf_token,
            Authorization: csrf_token
          }
        });

        $.getJSON(url_sex, function (response) {
          console.log(response);
          const data = pieChartSex.data;
          data.datasets[0].data[0] = response[0];
          data.datasets[0].data[1] = response[1];
        });
      }
    };

    var barChart1 = function () {
      if (jQuery("#barChart_1").length > 0) {
        const barChart_1 = document.getElementById("barChart_1").getContext("2d");

        barChart_1.height = 100;

        const ageChart = new Chart(barChart_1, {
          type: "bar",
          data: {
            defaultFontFamily: "Poppins",
            labels: ["0", "16"],
            datasets: [
              {
                label: "Total de Alunos",
                // data: [65, 59, 80, 81, 56, 55, 40],
                borderColor: "rgba(11, 42, 151, 1)",
                borderWidth: "0",
                backgroundColor: "rgba(11, 42, 151, 1)"
              }
            ]
          },
          options: {
            legend: false,
            scales: {
              yAxes: [
                {
                  ticks: {
                    beginAtZero: true
                  }
                }
              ],
              xAxes: [
                {
                  // Change here
                  barPercentage: 0.5
                }
              ]
            }
          }
        });

        let url_sex = $("input[name=api-dashboard-event-age]").val();
        let csrf_token = $("input[name=api-api-csrf_token]").val();

        $.ajaxSetup({
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrf_token,
            Authorization: csrf_token
          }
        });

        $.getJSON(url_sex, function (response) {
          // console.log(response);
          const data_ = ageChart.data;

          var age = [];
          var total = [];

          for (var i in response) {
            age.push(response[i].x), total.push(response[i].y);

            ageChart.data.labels = age;
            ageChart.data.datasets.labels = age;
            ageChart.data.datasets[0].data = total;
            ageChart.update();
          }
        });
      }
    };
    /* Function ============ */
    return {
      init: function () {},

      load: function () {
        chartBar();
        pieChart();
        barChart1();
      },

      resize: function () {}
    };
  })();

  jQuery(window).on("load", function () {
    dzSparkLine.load();
  });
})(jQuery);
