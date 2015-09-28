$(document).ready(function () {
            $.getJSON("getRuleID.php", function (result) {
                var chart = new CanvasJS.Chart("chartContainer3", {
					                   
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
