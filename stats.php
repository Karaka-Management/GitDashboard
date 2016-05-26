<?php
if(!defined('ROOT_PATH')) {
    return;
}
?>
<section>
    <div>
        <div class="stats-commits">
            <h2>Commits</h2>
            <div id="commit-chart" class="chart"></div>
            <script>
                let commitChart = new jsOMS.Chart.LineChart('commit-chart');
                commitChart.getChart().setMargin(5, 5, 5, 5);
                commitChart.getChart().setAxis('x', { label: { text: 'Month' }});
                commitChart.getChart().setAxis('y', { label: { text: 'Commits' }});
                commitChart.getChart().setLegend({visible: false});
                commitChart.getChart().setData([{
                    id: 'Something',
                    name: 'Huh',
                    points: [
                        {x: 1, y: 1},
                        {x: 2, y: 2},
                        {x: 3, y: 3},
                        {x: 4, y: 2},
                        {x: 5, y: 4},
                        {x: 6, y: 4},
                        {x: 7, y: 7},
                        {x: 8, y: 1},
                        {x: 9, y: 0},
                        {x: 10, y: 5},
                        {x: 11, y: 3},
                        {x: 12, y: 6}
                    ]
                }]);
                commitChart.draw();
            </script>
        </div>
    </div>
    <div>
        <div class="stats-loc">
            <h2>LOC</h2>
            <div id="loc-chart" class="chart"></div>
            <script>
                let locChart = new jsOMS.Chart.PieChart('loc-chart');
                locChart.getChart().setMargin(5, 5, 5, 5);
                locChart.getChart().setLegend({visible: false});
                locChart.getChart().setData([{
                    id: 'Something',
                    name: 'Huh',
                    points: [
                        {name: 'a', value: 1},
                        {name: 'b', value: 2},
                        {name: 'c', value: 3},
                        {name: 'd', value: 4},
                        {name: 'e', value: 5}
                    ]
                }]);
                locChart.draw();
            </script>
        </div>
    </div>
    <div>
        <div class="stats-bugs">
            <h2>Bugs</h2>
        </div>
    </div>
</section>
