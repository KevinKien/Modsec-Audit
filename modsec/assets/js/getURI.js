$(document).ready(function () {
            $.getJSON("getURI.php", function (result) {
                var chart = new CanvasJS.Chart("chartContainer2", {
                    data: [
                        {
                            type: "bar",
                            dataPoints: result
                        }
                    ]
                });
                chart.render();
            });
        });
