/**
 * @author DeGe
 * pie diagram kiiro script
 */
$(document).ready(function(){
	function pie(id, data) {
        $('#container_' + id).slideDown(function(){
        	$(this).highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
                /*'Milyen a kitöltési hajlandósága?'*/
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.y} db</b>',
            	percentageDecimals: 2
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'részeredmény',
                data: data
            }]
        });        	
        });
    }
    
    $('.pie').each(function(){
    	var obj_name = $(this).attr('rel');
    	
    	pie(obj_name, eval(obj_name));
    });
});     
