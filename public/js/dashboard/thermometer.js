

(function ($) {
	/* "use strict" */

	var dlabChartlistKpi = function () {

		var getBenchmark = function (category) {
			$.ajax({
				url: $('#urlstatistics').val(),
				type: 'GET',
				data: { category: category },
				dataType: 'json',
				success: function (result) {
					console.log(result)
					$('.canvas-chart.' + category).each(function (index) {
						activityChartKpi(result.periods, result.kpis[index], $(this).attr('id'))
						$('#user-' + $(this).attr('id')).find('.me-4 span').html(result.kpis[index].measuring.name);
					});
				},
				error: function (jqXHR, status, error) {
				},
				complete: function (jqXHR, status) {
				}
			});
		}
		var activityChartKpi = function (labels, data, selector) {
			console.log(selector);
			console.log(data);
			var activity = document.getElementById(selector);
			if (activity !== null) {
				$('')
				var activityData = data;
				activity.height = 280;

				var config = {
					type: "line",
					data: {
						labels: labels,
						datasets: [{
							label: data.measuring.name,
							data: data.first,
							borderColor: 'rgba(249, 58, 11, 1)',
							borderWidth: "2",
							backgroundColor: 'transparent',
							pointBackgroundColor: 'rgba(249, 58, 11, 1)'
							// label: "Porcentaje",
							// borderColor: "#3FC55E",
							// borderWidth: 6,
							// data: data.first,
							// backgroundColor: "rgba(82, 177, 65, 0)",
							// pointBackgroundColor: 'rgba(249, 58, 11, 1)',
						},
						]
					},
					options: {
						responsive: true,
						maintainAspectRatio: false,
						elements: {
							line: {
								tension: 0
							},
							point: {
								// radius: 0
							}
						},
						legend: false,

						scales: {
							yAxes: [{
								gridLines: {
									color: "rgba(89, 59, 219,0.1)",
									drawBorder: true
								},
								ticks: {
									// beginAtZero: true,
									// max: 100,
									// min: 0,
									// stepSize: 20,
									// padding: 10,
									fontSize: 10,
									fontColor: "#6E6E6E",
									fontFamily: "Poppins"
								},
							}],
							xAxes: [{
								//FontSize: 40,
								gridLines: {
									// display: false,
									// zeroLineColor: "transparent"
								},
								ticks: {
									fontSize: 10,
									stepSize: 5,
									fontColor: "#6E6E6E",
									fontFamily: "Poppins"
								}
							}]
						},
						tooltips: {
							enabled: true,
							mode: "index",
							intersect: false,
							titleFontColor: "#888",
							bodyFontColor: "#555",
							titleFontSize: 12,
							bodyFontSize: 15,
							backgroundColor: "rgba(256,256,256,0.95)",
							displayColors: true,
							xPadding: 10,
							yPadding: 7,
							borderColor: "rgba(220, 220, 220, 0.9)",
							borderWidth: 2,
							caretSize: 6,
							caretPadding: 10
						}
					}
				};

				var ctx = document.getElementById(selector).getContext("2d");
				var myLine = new Chart(ctx, config);

				// var items = document.querySelectorAll("#user-activos .nav-tabs .nav-item");
				// items.forEach(function(item, index) {
				// 	item.addEventListener("click", function() {
				// 		config.data.datasets[0].data = activityData[index].first;
				// 		config.data.datasets[1].data = activityData[index].second;
				// 		// config.data.datasets[2].data = activityData[index].third;
				// 		myLine.update();
				// 	});
				// });
			}
			else {
				console.log('not initialized');
			}


		}

		/* Function ============ */
		return {
			init: function () {
			},


			load: function () {
				// pieChart3();
				// chartBar();
				getBenchmark("credit");
				setTimeout(getBenchmark, 1000, "imor");
				setTimeout(getBenchmark, 1000, "reservas-crediticias");
				setTimeout(getBenchmark, 1000, "perdida-esperada");
				setTimeout(getBenchmark, 1000, "rentabilidad");
				// getBenchmark("imor");
				// getBenchmark("reservas-crediticias");
				// getBenchmark("perdida-esperada");
				// getBenchmark("rentabilidad");
				// activityChartKpi1();
				// activityBar1();

			},

			resize: function () {
			}
		}

	}();



	jQuery(window).on('load', function () {
		setTimeout(function () {
			dlabChartlistKpi.load();
		}, 1000);

	});



})(jQuery);