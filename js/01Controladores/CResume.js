$(document).ready(function() {
	$.blockUI();
	validaSesion();
	$.unblockUI();
	
	//initialize the javascript
	App.init();

	$("#fanCentrifugal").hide();
    $("#fanAxial").hide();
    $("#fanAir").hide();
    $("#tools").hide();

    $(".fanCentrifugal").click(function(){
      $("#fanCentrifugal").toggle();
    });

    $(".fanAxial").click(function(){
      $("#fanAxial").toggle();
    });

    $(".fanAir").click(function(){
      $("#fanAir").toggle();
    });

    $(".tools").click(function(){
      $("#tools").toggle();
    });

	unidades();

	$('#slcInletPressure').change(function() {
		$('#spanInletPressure').text('').text($('#slcInletPressure option:selected').text());
	});

	$('#tocanvas').on('click', function() {
		//alert('ok');
		html2canvas(document.body, {
		  onrendered: function(canvas) {
		    document.body.appendChild(canvas);
		  }
		});
	});

	$('#svg').on('click', function() {
  		canvasPresion();
  		canvasPoder();
  		setTimeout(function(){guardarGraficas()}, 2000);
  	});

	$('#btnSearch').on('click', function() {
  		listaBaseb();
  	});

  	$('#btnProceed').on('click', function() {
  		//alert('ok');
  		if ($('.panda').is(':checked')) {
  			//alert( $('.panda:checked').val() );

			var numero          = $('.panda:checked').val();
			var lineah          = $('#lineah_'+numero).val();
			var lineai          = $('#lineai_'+numero).val();
			var lineaj          = $('#lineaj_'+numero).val();
			var lineak          = $('#lineak_'+numero).val();
			var lineal          = $('#lineal_'+numero).val();
			var lineat          = $('#lineat_'+numero).val();
			var lineau          = $('#lineau_'+numero).val();
			var m12             = $('#m_'+numero).val();
			m12                 = parseFloat(m12);
			var loadPoint       = $('#loadPoint_'+numero).val();
			loadPoint           = parseFloat(loadPoint);
			var hp              = $('#hp_'+numero).val();
			hp                  = parseFloat(hp);
			var type            = $('#type_'+numero).val();
			var size            = $('#size_'+numero).val();
			var area            = $('#area_'+numero).val();
			var areaUnit        = $('#areaUnit_'+numero).val();
			var pd              = $('#pdActual_'+numero).val();
			var inConnection    = $('#inPa_'+numero).val();
			var totalPressure   = $('#ptActual_'+numero).val();
			var eff             = $('#eff_'+numero).val();
			var komp            = parseFloat($('#komp_'+numero).val());
			var hp              = parseFloat($('#hp_'+numero).val());
			var hpCold          = 0;
			var tempA           = parseFloat($('#txtTemp').val());
			var tempB           = parseFloat($('#txtTemCold').val());
			var line            = 0;
			var wr2             = parseFloat($('#wr2_'+numero).val());
			var wr2Unit         = $('#wr2Unit_'+numero).val();
			var totalWeight     = parseFloat($('#totalWeight_'+numero).val());
			var totalWeightUnit = $('#totalWeightUnit_'+numero).val();
			var rpm             = parseFloat($('#rpm_'+numero).val());
			var torqueOperation = 0;
			var torqueFlow      = 0;
			var s6              = parseFloat($('#s6_'+numero).val());
			var l1              = parseFloat($('#l1_'+numero).val());
			var pressureUnit = $('#slcInletPressure option:selected').text();

  			if (komp > 1) { komp = 1; }
  			hp = hp*komp;
  			hpCold = hp*(273.15+tempA)/(273.15+tempB);
  			line = 10*Math.sqrt(pd/totalPressure);
  			torqueOperation = hp/rpm*7121.4;
  			torqueFlow = l1/rpm*7121.4*293/(273+s6);

  			//Llenar los datos del resumen
  			//Primera seccion
  			$('#spanType').text('').text(type);
  			$('#spanSize').text('').text(size);
  			$('#spanArea').text('').text(area);
  			$('#spanAreaUnit').text('').text(areaUnit);
  			$('#spanPd').text('').text(Math.round(pd));
  			$('#spanPdUnit').text('').text(pressureUnit);
  			$('#spanInConnection').text('').text(inConnection);
  			$('#spanInConnectionUnit').text('').text(pressureUnit);
  			$('#spanOutConnection').text('').text(Math.round(pd));
  			$('#spanOutConnectionUnit').text('').text(pressureUnit);
  			//Segunda seccion
  			$('#spanFlow').text('').text(loadPoint);
  			$('#spanFlowUnit').text('').text($('#slcFlow option:selected').text());
  			$('#spanTotalPressure').text('').text(totalPressure);
  			$('#spanTotalPressureUnit').text('').text(pressureUnit);
  			$('#spanEff').text('').text(eff);
  			$('#spanKomp').text('').text(komp.toFixed(2));
  			$('#spanPower').text('').text(hp.toFixed(2));
  			$('#spanPowerCold').text('').text(hpCold.toFixed(2));
  			$('#spanLine').text('').text(line.toFixed(2));
  			$('#spanWr2').text('').text(wr2.toFixed(2));
  			$('#spanWr2Unit').text('').text(wr2Unit);
  			$('#spanTotalWeight').text('').text(totalWeight);
  			$('#spanTotalWeightUnit').text('').text(totalWeightUnit);
  			$('#spanSpeed').text('').text(rpm);
  			$('#spanTorqueOperation').text('').text(torqueOperation.toFixed(1));
  			$('#spanTorqueFlow').text('').text(torqueFlow.toFixed(1));

  			lineah = lineah.replace('[','').replace(']','').split(',');
  			lineai = lineai.replace('[','').replace(']','').split(',');
  			lineaj = lineaj.replace('[','').replace(']','').split(',');
  			lineak = lineak.replace('[','').replace(']','').split(',');
  			lineal = lineal.replace('[','').replace(']','').split(',');
  			lineat = lineat.replace('[','').replace(']','').split(',');
  			lineau = lineau.replace('[','').replace(']','').split(',');

  			var lh = new Array();
  			var li = new Array();
  			var lj = new Array();
  			var lk = new Array();
  			var ll = new Array();
  			var lt = new Array();
  			var lu = new Array();

  			for (var i in lineak) {
  				lh[i] = parseFloat(lineah[i]);
  				li[i] = parseFloat(lineai[i]);
  				lj[i] = parseFloat(lineaj[i]);
  				lk[i] = parseFloat(lineak[i]);
  				ll[i] = parseFloat(lineal[i]);
  				lt[i] = parseFloat(lineat[i]);
  				lu[i] = parseFloat(lineau[i]);
			}

			/**
			 * Grid-light theme for Highcharts JS
			 * @author Torstein Honsi
			 */

			// Load the fonts
			Highcharts.createElement('link', {
			   href: 'http://fonts.googleapis.com/css?family=Dosis:400,600',
			   rel: 'stylesheet',
			   type: 'text/css'
			}, null, document.getElementsByTagName('head')[0]);

			Highcharts.theme = {
			   colors: ["#000"],
			   chart: {
			      backgroundColor: null,
			      style: {
			         fontFamily: "Dosis, sans-serif"
			      }
			   },
			   title: {
			      style: {
			         fontSize: '16px',
			         fontWeight: 'bold',
			         textTransform: 'uppercase'
			      }
			   },
			   tooltip: {
			      borderWidth: 0,
			      backgroundColor: 'rgba(219,219,216,0.8)',
			      shadow: false
			   },
			   legend: {
			      itemStyle: {
			         fontWeight: 'bold',
			         fontSize: '13px'
			      }
			   },
			   xAxis: {
			      gridLineWidth: 0.5,
			      gridLineColor: '#000',
			      labels: {
			         style: {
			            fontSize: '12px'
			         }
			      }
			   },
			   yAxis: {
			   	  gridLineWidth: 0.5,
			   	  gridLineColor: '#000',
			      minorTickInterval: '0',
			      title: {
			         style: {
			            textTransform: ''
			         }
			      },
			      labels: {
			         style: {
			            fontSize: '12px'
			         }
			      }
			   },
			   plotOptions: {
			      candlestick: {
			         lineColor: '#000'
			      },
			      series: {
		            marker: {
		                enabled: false
		            }
		          }
			   },

			   // General
			   background2: '#FFF'
			   
			};

			// Apply the theme
			Highcharts.setOptions(Highcharts.theme);
  			

  			$('#graficaPresion').highcharts({
  				chart: {
  					type: 'spline'
  				},
  				colors: ["#000"],
	            title: {
	                text: 'PERFORMANCE CURVE',
	                x: 0 //center
	            },
	            xAxis: {
	            	labels: {
		                formatter: function () {
		                    return this.value + '';
		                }
		            },
	                title: {
	                	text: 'FLOW - m3/h'
	                },
	                plotLines: [{
	                	width: 0.5,
	                	color: '#000'
	                }]
	            },
	            yAxis: {
	            	labels: {
		                formatter: function () {
		                    return this.value + '';
		                }
		            },
	                title: {
	                    text: 'PRESSURE - Pa'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 0.5,
	                    color: '#000'
	                }]
	            },
	            tooltip: {
	                valueSuffix: ''
	            },
	            legend: {
	                layout: 'vertical',
	                align: 'right',
	                verticalAlign: 'middle',
	                borderWidth: 0
	            },
	            series: [{
	            	showInLegend: false,
	                name: 'Operating curve',
	                data: [{
		                dataLabels: {
		                    enabled: true,
		                    align: 'left',
		                    style: {
		                        fontWeight: 'bold',
		                        fontSize: '15px'
		                    },
		                    x: 3,
		                    verticalAlign: 'bottom',
		                    overflow: true,
		                    crop: false,
		                    formatter: function() {
		                    	return this.series.name;
		                    }
		                },
		                x: lh[0],
		                y: lk[0]
		            },
	                	[lh[1],lk[1]],
	                	[lh[2],lk[2]],
	                	[lh[3],lk[3]],
	                	[lh[4],lk[4]],
	                	[lh[5],lk[5]],
	                	[lh[6],lk[6]],
	                	[lh[7],lk[7]],
	                	[lh[8],lk[8]],
	                	[lh[9],lk[9]]
	                ]
	            }, {
	            	showInLegend: false,
	                name: '2º',
	                data: [
		                [lh[0],(lj[0]*25)],
		                [lh[1],(lj[1]*25)],
		                [lh[2],(lj[2]*25)],
		                [lh[3],(lj[3]*25)],
		                [lh[4],(lj[4]*25)],
		                [lh[5],(lj[5]*25)],{
		                dataLabels: {
		                    enabled: true,
		                    align: 'left',
		                    style: {
		                        fontWeight: 'bold',
		                        fontSize: '15px'
		                    },
		                    x: 3,
		                    verticalAlign: 'top',
		                    overflow: true,
		                    crop: false,
		                    formatter: function() {
		                    	return this.series.name;
		                    }
		                },
		                x: lh[6],
		                y: lj[6]*25
		            }
		            ]
	            }, {
	            	showInLegend: false,
	                name: '5º',
	                data: [
		                [lh[0],(lj[0]*4)],
		                [lh[1],(lj[1]*4)],
		                [lh[2],(lj[2]*4)],
		                [lh[3],(lj[3]*4)],
		                [lh[4],(lj[4]*4)],
		                [lh[5],(lj[5]*4)],
		                [lh[6],(lj[6]*4)],
		                [lh[7],(lj[7]*4)],
		                [lh[8],(lj[8]*4)],{
		                dataLabels: {
		                    enabled: true,
		                    align: 'left',
		                    style: {
		                        fontWeight: 'bold',
		                        fontSize: '15px'
		                    },
		                    x: -10,
		                    verticalAlign: 'bottom',
		                    overflow: true,
		                    crop: false,
		                    formatter: function() {
		                    	return this.series.name;
		                    }
		                },
		                x: lh[9],
		                y: lj[9]*4
		            }
		            ]
	            }, {
	            	showInLegend: false,
	                name: '10º',
	                data: [
		                [lh[0],lj[0]],
		                [lh[1],lj[1]],
		                [lh[2],lj[2]],
		                [lh[3],lj[3]],
		                [lh[4],lj[4]],
		                [lh[5],lj[5]],
		                [lh[6],lj[6]],
		                [lh[7],lj[7]],
		                [lh[8],lj[8]],{
		                dataLabels: {
		                    enabled: true,
		                    align: 'left',
		                    style: {
		                        fontWeight: 'bold',
		                        fontSize: '15px'
		                    },
		                    x: -15,
		                    verticalAlign: 'bottom',
		                    overflow: true,
		                    crop: false,
		                    formatter: function() {
		                    	return this.series.name;
		                    }
		                },
		                x: lh[9],
		                y: lj[9]
		            }
		            ]
	            }, {
	            	showInLegend: false,
	                name: 'Operating point XY',
	                data: [{
		                dataLabels: {
		                    enabled: true,
		                    align: 'left',
		                    style: {
		                        fontWeight: 'bold',
		                        fontSize: '15px'
		                    },
		                    x: 3,
		                    verticalAlign: 'bottom',
		                    overflow: true,
		                    crop: false,
		                    formatter: function() {
		                    	return this.series.name;
		                    }
		                },
		                x: 0,
		                y: m12
		            },
		                [loadPoint, m12],
		                [loadPoint, 0]
		            ]
	            }],
	            exporting: {
		            enabled: false
		        },
	        });

			$('#graficaPoder').highcharts({
				exporting: {
		            enabled: false
		        },
				chart: {
  					type: 'spline'
  				},
				colors: ["#000"],
	            title: {
	                text: '',
	                x: -50 //center
	            },
	            xAxis: {
	            	labels: {
		                formatter: function () {
		                    return this.value + '';
		                }
		            },
	                title: {
	                	text: 'FLOW - m3/h'
	                }
	            },
	            yAxis: {
	            	labels: {
		                formatter: function () {
		                    return this.value + '';
		                }
		            },
	                title: {
	                    text: 'POWER - Hp'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 0.5,
	                    color: '#000'
	                }]
	            },
	            tooltip: {
	                valueSuffix: ''
	            },
	            legend: {
	                layout: 'vertical',
	                align: 'right',
	                verticalAlign: 'middle',
	                borderWidth: 0
	            },
	            series: [{
	            	showInLegend: false,
	            	name: 'Operating curve',
	                data: [{
		                dataLabels: {
		                    enabled: true,
		                    align: 'left',
		                    style: {
		                        fontWeight: 'bold',
		                        fontSize: '15px'
		                    },
		                    x: 3,
		                    verticalAlign: 'middle',
		                    overflow: true,
		                    crop: false,
		                    formatter: function() {
		                    	return this.series.name;
		                    }
		                },
		                x: lh[0],
		                y: ll[0]
		            },
	                	[lh[1],ll[1]],
	                	[lh[2],ll[2]],
	                	[lh[3],ll[3]],
	                	[lh[4],ll[4]],
	                	[lh[5],ll[5]],
	                	[lh[6],ll[6]],
	                	[lh[7],ll[7]],
	                	[lh[8],ll[8]],
	                	[lh[9],ll[9]]
	                ]
	            }, {
	            	showInLegend: false,
	            	name: 'Operating point XY',
	                data: [{
		                dataLabels: {
		                    enabled: true,
		                    align: 'left',
		                    style: {
		                        fontWeight: 'bold',
		                        fontSize: '15px'
		                    },
		                    x: 3,
		                    verticalAlign: 'bottom',
		                    overflow: true,
		                    crop: false,
		                    formatter: function() {
		                    	return this.series.name;
		                    }
		                },
		                x: 0,
		                y: hp
		            },
		                [loadPoint, hp],
		                [loadPoint, 0],
		            ]
	            }]
	        });
  		}
  		
  	});

  	$('.md-trigger').modalEffects();
  	
});	

function imprimePDFResume(){
	
	$.blockUI();

	var flow              = '&flow='+$('#txtFlow').val();
	var flowUnit          = '&flowUnit='+$('#slcFlow option:selected').text();
	var inletPressure     = '&inletPressure='+$('#txtInletPressure').val();
	var inletPressureUnit = '&inletPressureUnit='+$('#slcInletPressure option:selected').text();
	var ouletPressure     = '&ouletPressure='+$('#txtOuletPressure').val();
	var temp              = '&temp='+$('#txtTemp').val();
	var tempUnit          = '&tempUnit='+$('#hdnTemp').val();
	var tempCold          = '&tempCold='+$('#txtTemCold').val();
	var density           = '&density='+$('#txtDensity').val();
	var densityUnit       = '&densityUnit='+$('#slcDensity option:selected').text();
	var type              = '&type='+$('#spanType').text();
	var size              = '&size='+$('#spanSize').text();
	var area              = '&area='+$('#spanArea').text();
	var areaUnit          = '&areaUnit='+$('#spanAreaUnit').text();
	var pd                = '&pd='+$('#spanPd').text();
	var pdUnit            = '&pdUnit='+$('#spanPdUnit').text();
	var accessories       = '&accessories='+$('#spanAccessories').text();
	var inlet             = '&inlet='+$('#spanInConnection').text();
	var oulet             = '&oulet='+$('#spanOutConnection').text();
	var sflow             = '&sflow='+$('#spanFlow').text();
	var totalPressure     = '&totalPressure='+$('#spanTotalPressure').text();
	var eff               = '&eff='+$('#spanEff').text();
	var komp              = '&komp='+$('#spanKomp').text();
	var power             = '&power='+$('#spanPower').text();
	var powerCold         = '&powerCold='+$('#spanPowerCold').text();
	var line              = '&line='+$('#spanLine').text();
	var wr2               = '&wr2='+$('#spanWr2').text();
	var wr2Unit           = '&wr2Unit='+$('#spanWr2Unit').text();
	var totalWeight       = '&totalWeight='+$('#spanTotalWeight').text();
	var totalWeightUnit   = '&totalWeightUnit='+$('#spanTotalWeightUnit').text();
	var speed             = '&speed='+$('#spanSpeed').text();
	var torqueOperation   = '&torqueOperation='+$('#spanTorqueOperation').text();
	var torqueFlow        = '&torqueFlow='+$('#spanTorqueFlow').text();
	var seller            = '&seller='+$('#hdnSeller').val();
	var customerName        = '&customerName='+escape($('#hdnCustomerName').val());
	var proposal          = '&proposal='+$('#hdnProposal').val();
	var departure = '&departure='+$('#txtDeparture').val();

	var datos             = flow+flowUnit+inletPressure+inletPressureUnit+ouletPressure+temp+tempUnit+tempCold+density+densityUnit+type+size+area+areaUnit+pd+pdUnit+accessories+inlet+oulet+sflow+totalPressure+eff+komp+power+powerCold+line+wr2+wr2Unit+totalWeight+totalWeightUnit+speed+torqueOperation+torqueFlow+seller+customerName+proposal+departure;

	canvasPresion();
  	canvasPoder();
  	setTimeout(function(){ guardarGraficas()}, 2000 );

  	setTimeout(function(){

  		var canvasa = document.getElementById('canvasPresion');
  		canvasa.width=canvasa.width;
  		var canvasb = document.getElementById('canvasPoder');
  		canvasb.width=canvasb.width;

  		//Lanzando pdf de reporte
		var vDatos = "acc=imprimePDF"+datos;
		var vUrl = "php/02Controladores/CResume.php";

		peticionAjax(vDatos, vUrl).done(function(vRes) {

			window.open('media/pdf/resumeImp.pdf', '_blank');

			$.unblockUI();
		});
	}

  	,3000 );
	
}

function unidades(){
	var vDatos = "acc=sistemaUnidades";
	var vUrl = "php/02Controladores/CResume.php";

	peticionAjaxJSON(vDatos, vUrl).done(function(vRes) {
		console.warn(vRes['System']);
		
		if (vRes['System'] == 'SI') {
			//Solo se muestran las opciones SI en los combos
			$('.uSA').hide();
			$('.uSI').show();
			$('#hdnTemp').text('').text('c');
		} else {
			//Solo se muestran las opciones SA en los combos
			$('.uSI').hide();
			$('.uSA').show();
			$('#hdnTemp').text('').text('f');
		}

		$('#spanBladeType').text('').text(vRes['BladeType'])
		$('#hdnBladeType').val(vRes['BladeType']);

		$('#hdnCustomerName').val('').val(vRes['CustomerName']);
		$('#hdnProposal').val('').val(vRes['Proposal']);

		$('#spanInletPressure').text('').text($('#slcInletPressure option:selected').text());
		
	});	  
}

function listaBaseb(){
	console.warn('Entro');

	var vIndata = {
		"bladeType"    : $('#hdnBladeType').val(),
		"flow"         : $('#txtFlow').val(),
		"flowUnit"     : $('#slcFlow').val(),
		"inp"          : $('#txtInletPressure').val(),
		"inpUnit"      : $('#slcInletPressure').val(),
		"outp"         : $('#txtOuletPressure').val(),
		"temp"         : $('#txtTemp').val(),
		"tempUnit"     : $('#hdnTemp').val(),
		"tempCold"     : $('#txtTemCold').val(),
		"density"      : $('#txtDensity').val(),
		"densityUnit"  : $('#slcDensity').val()
	}
	
	var vDatos = "acc=consultaBaseb&indata=" + jQuery.stringify(vIndata);
	var vUrl   = "php/02Controladores/CResume.php";
	//alert(vDatos);

	peticionAjaxJSON(vDatos, vUrl).done(function(vRes) {
		
		$("#fans > tbody > tr").remove();
		$("#fans > tbody").append(vRes['tr']);

		$.fn.dataTableExt.sErrMode = 'throw';

		$('#fans').dataTable({
	        "paging":   false,
	        "info":     false,
	        "order": [[ 4, "asc" ]],
	        "searching": false,
	        "columnDefs": [
			    { "orderable": false, "targets": 0 },
			    { "orderable": false, "targets": 1 },
			    { "orderable": false, "targets": 2 },
			    { "orderable": false, "targets": 3 },
			    { "orderable": false, "targets": 4 },
			    { "orderable": false, "targets": 5 },
			    { "orderable": false, "targets": 6 },
			    { "orderable": false, "targets": 7 },
			    { "orderable": false, "targets": 8 }
			]
	    });
	});

	 
}

function canvasPresion(){
	var canvas = document.getElementById('canvasPresion');
    var ctx    = canvas.getContext('2d');

    var chart = $('#graficaPresion').highcharts(),
    svg = chart.getSVG();

    var data   = svg;

    var DOMURL = window.URL || window.webkitURL || window;

    var img = new Image();
    var svg = new Blob([data], {type: 'image/svg+xml;charset=utf-8'});
    var url = DOMURL.createObjectURL(svg);

    img.onload = function () {
      ctx.drawImage(img, 0, 0);
      DOMURL.revokeObjectURL(url);
    }

    img.src = url;
}

function canvasPoder(){
	var canvas = document.getElementById('canvasPoder');
    var ctx    = canvas.getContext('2d');

    var chart = $('#graficaPoder').highcharts(),
    svg = chart.getSVG();

    var data   = svg;

    var DOMURL = window.URL || window.webkitURL || window;

    var img = new Image();
    var svg = new Blob([data], {type: 'image/svg+xml;charset=utf-8'});
    var url = DOMURL.createObjectURL(svg);

    img.onload = function () {
      ctx.drawImage(img, 0, 0);
      DOMURL.revokeObjectURL(url);
    }

    img.src = url;
}

function guardarGraficas(){

	//Obteniendo chartA de canvas
	html2canvas($("#graficaPresionPfd"), {
	  onrendered: function(canvas) {

	  	var context = canvas.getContext("2d");
		vImgChartA = canvas.toDataURL("image/png", 1.0);		
	  }
	});

	//Obteniendo chartB de canvas
	html2canvas($("#graficaPoderPfd"), {
  		onrendered: function(canvas) {
		  	
		  	var context = canvas.getContext("2d");
			vImgChartB = canvas.toDataURL("image/png",1.0);

			var vOUTChatA = vImgChartA.replace(/^data:image\/(png|jpg);base64,/, "");
            var vOUTChatA = encodeURIComponent(vImgChartA);

            var vOUTChatB = vImgChartB.replace(/^data:image\/(png|jpg);base64,/, "");
            var vOUTChatB = encodeURIComponent(vImgChartB);

			var vDatos =  "acc=guardaGraficas&chartA=" + vOUTChatA + "&chartB=" + vOUTChatB;
			var vUrl = "php/02Controladores/CResume.php";
			
			//Enviando a guardar Charts en formato imagen para usar en reporte.
			peticionAjax(vDatos, vUrl).done(function(vRes) { 			
			});

  		}
	});

	//$('.generarImagenGrafica').hide();
}