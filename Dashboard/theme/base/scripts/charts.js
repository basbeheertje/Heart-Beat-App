    function getRandomData() {
                if (data.length > 0) data = data.slice(1);
                // do a random walk
                while (data.length < totalPoints) {
                    var prev = data.length > 0 ? data[data.length - 1] : 50;
                    var y = prev + Math.random() * 10 - 5;
                    if (y < 0) y = 0;
                    if (y > 100) y = 100;
                    data.push(y);
                }
                // zip the generated y values with the x values
                var res = [];
                for (var i = 0; i < data.length; ++i) res.push([i, data[i]])
                return res;
            }
            
function showTooltip(title, x, y, contents) {
                if(contents > 79 && contents < 101){
                    
                    var cls = 'label-success';
                }else if(contents < 121 && contents > 60){
                    var cls = 'label-warning';
                }else{
                    var cls = 'label-danger';
                }
                $('<div id="tooltip" class="chart-tooltip"><div class="date">' + title + '<\/div><div class="label '+cls+'">' + contents + '<\/div><div style="display:none;" class="label label-danger">Imp: ' + x * 12 + '<\/div><\/div>').css({
                    position: 'absolute',
                    display: 'none',
                    top: y - 100,
                    width: 80,
                    left: x - 40,
                    border: '0px solid #ccc',
                    padding: '2px 6px',
                    'background-color': '#fff',
                }).appendTo("body").fadeIn(200);
            }

            function randValue() {
                return (Math.floor(Math.random() * (1 + 50 - 20))) + 10;
            }
            
            function initDashboard(){
                
                if ($('#site_statistics').size() != 0) {

                $('#site_statistics_loading').hide();
                $('#site_statistics_content').show();

                var plot_statistics = $.plot($("#site_statistics"), [{
                        data: hartslag,
                        label: "Hartslag"
                    }
                ], {
                    series: {
                        lines: {
                            show: true,
                            lineWidth: 2,
                            fill: true,
                            fillColor: {
                                colors: [{
                                        opacity: 0.05
                                    }, {
                                        opacity: 0.01
                                    }
                                ]
                            }
                        },
                        points: {
                            show: true
                        },
                        shadowSize: 2
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#eee",
                        borderWidth: 0
                    },
                    colors: ["#d12610", "#37b7f3", "#52e136"],
                    xaxis: {
                        ticks: 11,
                        tickDecimals: 0
                    },
                    yaxis: {
                        ticks: 11,
                        tickDecimals: 0
                    }
                });

                var previousPoint = null;
                $("#site_statistics").bind("plothover", function (event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);

                            var difference = 30 - item.dataIndex;
                            var d = new Date();
                            d.setDate(d.getDate() - difference);
                            var month = d.getMonth();
                            if(month == 0){
                                month = 'Jan';
                            }else if(month == 1){
                                month = 'Feb';
                            }else if(month == 2){
                                month = 'Maa';
                            }else if(month == 3){
                                month = 'Apr';
                            }else if(month == 4){
                                month = 'Mei';
                            }else if(month == 5){
                                month = 'Jun';
                            }else if(month == 6){
                                month = 'Jul';
                            }else if(month == 7){
                                month = 'Aug';
                            }else if(month == 8){
                                month = 'Sep';
                            }else if(month == 9){
                                month = 'Okt';
                            }else if(month == 10){
                                month = 'Nov';
                            }else if(month == 11){
                                month = 'Dec';
                            }
                            
                            var newdate = d.getDate() + ' ' + month + ' ' + d.getFullYear();
                            showTooltip(hartslag[item.datapoint[0]][2], item.pageX, item.pageY, y);
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
            }
                
            }