

(function($) {
    /* "use strict" */
	
 var dlabChartlistKpi = function(){
	
	var getBenchmark = function(){
        $.ajax({
            url: $('#urlstatistics').val(),
            type: 'GET',
            data: { category: 'porcentaje_recupero' },
            dataType: 'json',
            success: function (result) {
                console.log(result)
                activityChartKpi1(result.periods, result.kpis)
            },
            error: function (jqXHR, status, error) {
            },
            complete: function (jqXHR, status) {
            }
        });
    }
	var activityChartKpi1 = function(labels, data){
		var activity = document.getElementById("kpi1");
			if (activity !== null) {
				var activityData = data;
				activity.height = 300;
				
				var config = {
					type: "bar",
					data: {
						labels: labels,
						datasets: [{
								label: "Tu valor",
								backgroundColor: "#3FC55E",
								borderColor: "#3FC55E",
								data: activityData[0].first,
								borderWidth: 6
							},
							{
								label: "Promedio",
								backgroundColor: '#4955FA',
								borderColor: "#4955FA",
								data: activityData[0].second,
								borderWidth: 6,
								
							},
						]
					},
					options: {
						responsive: true,
						maintainAspectRatio: false,
						elements: {
								point:{
									radius: 0
								}
						},
						legend:false,
						
						scales: {
							yAxes: [{
								gridLines: {
									color: "rgba(89, 59, 219,0.1)",
									drawBorder: true
								},
								ticks: {
									fontSize: 14,
									fontColor: "#6E6E6E",
									fontFamily: "Poppins"
								},
							}],
							xAxes: [{
								//FontSize: 40,
								gridLines: {
									display: false,
									zeroLineColor: "transparent"
								},
								ticks: {
									fontSize: 14,
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

				var ctx = document.getElementById("kpi1").getContext("2d");
				var myLine = new Chart(ctx, config);

				var items = document.querySelectorAll("#user-kpi1 .nav-tabs .nav-item");
				items.forEach(function(item, index) {
					item.addEventListener("click", function() {
						config.data.datasets[0].data = activityData[index].first;
						config.data.datasets[1].data = activityData[index].second;
						// config.data.datasets[2].data = activityData[index].third;
						myLine.update();
					});
				});
			}
	
		
	}

	var getBenchmark2 = function(){
        $.ajax({
            url: $('#urlstatistics').val(),
            type: 'GET',
            data: { category: 'crecimiento_pagos' },
            dataType: 'json',
            success: function (result) {
                console.log(result)
                activityChartKpi2(result.periods, result.kpis)
            },
            error: function (jqXHR, status, error) {
            },
            complete: function (jqXHR, status) {
            }
        });
    }
	var activityChartKpi2 = function(labels, data){
		var activity = document.getElementById("kpi2");
			if (activity !== null) {
				var activityData = data;
				activity.height = 300;
				
				var config = {
					type: "bar",
					data: {
						labels: labels,
						datasets: [{
								label: "Tu valor",
								backgroundColor: "#3FC55E",
								borderColor: "#3FC55E",
								data: activityData[0].first,
								borderWidth: 6
							},
							{
								label: "Promedio",
								backgroundColor: '#4955FA',
								borderColor: "#4955FA",
								data: activityData[0].second,
								borderWidth: 6,
								
							},
						]
					},
					options: {
						responsive: true,
						maintainAspectRatio: false,
						elements: {
								point:{
									radius: 0
								}
						},
						legend:false,
						
						scales: {
							yAxes: [{
								gridLines: {
									color: "rgba(89, 59, 219,0.1)",
									drawBorder: true
								},
								ticks: {
									fontSize: 14,
									fontColor: "#6E6E6E",
									fontFamily: "Poppins"
								},
							}],
							xAxes: [{
								//FontSize: 40,
								gridLines: {
									display: false,
									zeroLineColor: "transparent"
								},
								ticks: {
									fontSize: 14,
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

				var ctx = document.getElementById("kpi2").getContext("2d");
				var myLine = new Chart(ctx, config);

				var items = document.querySelectorAll("#user-kpi2 .nav-tabs .nav-item");
				items.forEach(function(item, index) {
					item.addEventListener("click", function() {
						config.data.datasets[0].data = activityData[index].first;
						config.data.datasets[1].data = activityData[index].second;
						// config.data.datasets[2].data = activityData[index].third;
						myLine.update();
					});
				});
			}
	
		
	}

	var getBenchmark3 = function(){
        $.ajax({
            url: $('#urlstatistics').val(),
            type: 'GET',
            data: { category: 'rescate' },
            dataType: 'json',
            success: function (result) {
                console.log(result)
                activityChartKpi3(result.periods, result.kpis)
            },
            error: function (jqXHR, status, error) {
            },
            complete: function (jqXHR, status) {
            }
        });
    }
	var activityChartKpi3 = function(labels, data){
		var activity = document.getElementById("kpi3");
			if (activity !== null) {
				var activityData = data;
				activity.height = 300;
				
				var config = {
					type: "bar",
					data: {
						labels: labels,
						datasets: [{
								label: "Tu valor",
								backgroundColor: "#3FC55E",
								borderColor: "#3FC55E",
								data: activityData[0].first,
								borderWidth: 6
							},
							{
								label: "Promedio",
								backgroundColor: '#4955FA',
								borderColor: "#4955FA",
								data: activityData[0].second,
								borderWidth: 6,
								
							},
						]
					},
					options: {
						responsive: true,
						maintainAspectRatio: false,
						elements: {
								point:{
									radius: 0
								}
						},
						legend:false,
						
						scales: {
							yAxes: [{
								gridLines: {
									color: "rgba(89, 59, 219,0.1)",
									drawBorder: true
								},
								ticks: {
									fontSize: 14,
									fontColor: "#6E6E6E",
									fontFamily: "Poppins"
								},
							}],
							xAxes: [{
								//FontSize: 40,
								gridLines: {
									display: false,
									zeroLineColor: "transparent"
								},
								ticks: {
									fontSize: 14,
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

				var ctx = document.getElementById("kpi3").getContext("2d");
				var myLine = new Chart(ctx, config);

				var items = document.querySelectorAll("#user-kpi3 .nav-tabs .nav-item");
				items.forEach(function(item, index) {
					item.addEventListener("click", function() {
						config.data.datasets[0].data = activityData[index].first;
						config.data.datasets[1].data = activityData[index].second;
						// config.data.datasets[2].data = activityData[index].third;
						myLine.update();
					});
				});
			}
	
		
	}

	var getBenchmark4 = function(){
        $.ajax({
            url: $('#urlstatistics').val(),
            type: 'GET',
            data: { category: 'contencion' },
            dataType: 'json',
            success: function (result) {
                console.log(result)
                activityChartKpi4(result.periods, result.kpis)
            },
            error: function (jqXHR, status, error) {
            },
            complete: function (jqXHR, status) {
            }
        });
    }
	var activityChartKpi4 = function(labels, data){
		var activity = document.getElementById("kpi4");
			if (activity !== null) {
				var activityData = data;
				activity.height = 300;
				
				var config = {
					type: "bar",
					data: {
						labels: labels,
						datasets: [{
								label: "Tu valor",
								backgroundColor: "#3FC55E",
								borderColor: "#3FC55E",
								data: activityData[0].first,
								borderWidth: 6
							},
							{
								label: "Promedio",
								backgroundColor: '#4955FA',
								borderColor: "#4955FA",
								data: activityData[0].second,
								borderWidth: 6,
								
							},
						]
					},
					options: {
						responsive: true,
						maintainAspectRatio: false,
						elements: {
								point:{
									radius: 0
								}
						},
						legend:false,
						
						scales: {
							yAxes: [{
								gridLines: {
									color: "rgba(89, 59, 219,0.1)",
									drawBorder: true
								},
								ticks: {
									fontSize: 14,
									fontColor: "#6E6E6E",
									fontFamily: "Poppins"
								},
							}],
							xAxes: [{
								//FontSize: 40,
								gridLines: {
									display: false,
									zeroLineColor: "transparent"
								},
								ticks: {
									fontSize: 14,
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

				var ctx = document.getElementById("kpi4").getContext("2d");
				var myLine = new Chart(ctx, config);

				var items = document.querySelectorAll("#user-kpi4 .nav-tabs .nav-item");
				items.forEach(function(item, index) {
					item.addEventListener("click", function() {
						config.data.datasets[0].data = activityData[index].first;
						config.data.datasets[1].data = activityData[index].second;
						// config.data.datasets[2].data = activityData[index].third;
						myLine.update();
					});
				});
			}
	
		
	}

	var getBenchmark5 = function(){
        $.ajax({
            url: $('#urlstatistics').val(),
            type: 'GET',
            data: { category: 'current' },
            dataType: 'json',
            success: function (result) {
                console.log(result)
                activityChartKpi5(result.periods, result.kpis)
            },
            error: function (jqXHR, status, error) {
            },
            complete: function (jqXHR, status) {
            }
        });
    }
	var activityChartKpi5 = function(labels, data){
		var activity = document.getElementById("kpi5");
			if (activity !== null) {
				var activityData = data;
				activity.height = 300;
				
				var config = {
					type: "bar",
					data: {
						labels: labels,
						datasets: [{
								label: "Tu valor",
								backgroundColor: "#3FC55E",
								borderColor: "#3FC55E",
								data: activityData[0].first,
								borderWidth: 6
							},
							{
								label: "Promedio",
								backgroundColor: '#4955FA',
								borderColor: "#4955FA",
								data: activityData[0].second,
								borderWidth: 6,
								
							},
						]
					},
					options: {
						responsive: true,
						maintainAspectRatio: false,
						elements: {
								point:{
									radius: 0
								}
						},
						legend:false,
						
						scales: {
							yAxes: [{
								gridLines: {
									color: "rgba(89, 59, 219,0.1)",
									drawBorder: true
								},
								ticks: {
									fontSize: 14,
									fontColor: "#6E6E6E",
									fontFamily: "Poppins"
								},
							}],
							xAxes: [{
								//FontSize: 40,
								gridLines: {
									display: false,
									zeroLineColor: "transparent"
								},
								ticks: {
									fontSize: 14,
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

				var ctx = document.getElementById("kpi5").getContext("2d");
				var myLine = new Chart(ctx, config);

				var items = document.querySelectorAll("#user-kpi5 .nav-tabs .nav-item");
				items.forEach(function(item, index) {
					item.addEventListener("click", function() {
						config.data.datasets[0].data = activityData[index].first;
						config.data.datasets[1].data = activityData[index].second;
						// config.data.datasets[2].data = activityData[index].third;
						myLine.update();
					});
				});
			}
	
		
	}

	var getBenchmark6 = function(){
        $.ajax({
            url: $('#urlstatistics').val(),
            type: 'GET',
            data: { category: 'rotacion' },
            dataType: 'json',
            success: function (result) {
                console.log(result)
                activityChartKpi6(result.periods, result.kpis)
            },
            error: function (jqXHR, status, error) {
            },
            complete: function (jqXHR, status) {
            }
        });
    }
	var activityChartKpi6 = function(labels, data){
		var activity = document.getElementById("kpi6");
			if (activity !== null) {
				var activityData = data;
				activity.height = 300;
				
				var config = {
					type: "bar",
					data: {
						labels: labels,
						datasets: [{
								label: "Tu valor",
								backgroundColor: "#3FC55E",
								borderColor: "#3FC55E",
								data: activityData[0].first,
								borderWidth: 6
							},
							{
								label: "Promedio",
								backgroundColor: '#4955FA',
								borderColor: "#4955FA",
								data: activityData[0].second,
								borderWidth: 6,
								
							},
						]
					},
					options: {
						responsive: true,
						maintainAspectRatio: false,
						elements: {
								point:{
									radius: 0
								}
						},
						legend:false,
						
						scales: {
							yAxes: [{
								gridLines: {
									color: "rgba(89, 59, 219,0.1)",
									drawBorder: true
								},
								ticks: {
									fontSize: 14,
									fontColor: "#6E6E6E",
									fontFamily: "Poppins"
								},
							}],
							xAxes: [{
								//FontSize: 40,
								gridLines: {
									display: false,
									zeroLineColor: "transparent"
								},
								ticks: {
									fontSize: 14,
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

				var ctx = document.getElementById("kpi6").getContext("2d");
				var myLine = new Chart(ctx, config);

				var items = document.querySelectorAll("#user-kpi6 .nav-tabs .nav-item");
				items.forEach(function(item, index) {
					item.addEventListener("click", function() {
						config.data.datasets[0].data = activityData[index].first;
						config.data.datasets[1].data = activityData[index].second;
						// config.data.datasets[2].data = activityData[index].third;
						myLine.update();
					});
				});
			}
	
		
	}
	
 
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){
				// pieChart3();
				// chartBar();
                getBenchmark();
				getBenchmark2();
				getBenchmark3();
				getBenchmark4();
				getBenchmark5();
				getBenchmark6();
				// activityChartKpi1();
				// activityBar1();
				
			},
			
			resize:function(){
			}
		}
	
	}();

	
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dlabChartlistKpi.load();
		}, 1000); 
		
	});

     

})(jQuery);