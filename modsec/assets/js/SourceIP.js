$(document).ready(function () {
            $.getJSON("getIP.php", function (result) {
                var chart = new CanvasJS.Chart("chartContainer1", {
					                    
					data: [
                        {
                            type: "column",
                            dataPoints: result
                        }
                    ]
                });
                chart.render();
            });
        });
