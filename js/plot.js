//import * as d3 from "d3/scatterplot";

$(document).ready(function() {
    $.ajax({
        url: 'plot.php',
        method: "GET",
        dataType: 'json'
    }).done(function(data) {
        data = data["data"]
        const width = 640,
            height = 400,
            margin = {
                top: 50,
                right: 50,
                bottom: 50,
                left: 50
            },
            innerWidth = width - margin.left - margin.right,
            innerHeight = height - margin.top - margin.bottom;

        const svg = d3.select(".plot").append("svg")
            .attr("width", width)
            .attr("height", height)
            .append("g")
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
        
        // x and y minimum and maximum values
        const xMin = d3.min(data, function(d){
            return d.Longitude;
        });
        const xMax = d3.max(data, function(d) {
            return d.Longitude;
        });
        const yMin = d3.min(data, function(d){
            return d.Latitude;
        });
        const yMax = d3.max(data, function(d) {
            return d.Latitude;
        });

        // x and y scales
        const xScale = d3.scaleLinear() 
            .domain([xMax + 1, xMin - 1])
            .range([0, innerWidth]);
        const yScale = d3.scaleLinear()
            .domain([yMin, yMax])
            .range([innerHeight, 0]);

        // Defining Axises and grid lines
        const xAxis = d3.axisBottom(xScale).ticks(10);
        const yAxis = d3.axisLeft(yScale).ticks(10);
        const xAxisGrid = d3.axisBottom(xScale).tickSize(-innerHeight).tickFormat("").ticks(10);
        const yAxisGrid = d3.axisLeft(yScale).tickSize(-innerWidth).tickFormat("").ticks(10);

        // x Axis
        svg.append("g")
            .attr("transform", "translate(0," + innerHeight + ")")
            .call(xAxis);

        // y Axis
        svg.append("g")
            .call(yAxis);

        // drawing the grid in the back
        svg.append("g")
            .attr("transform", "translate(0," + innerHeight + ")")
            .style("opacity", 0.1)
            .call(xAxisGrid)

        svg.append("g")
            .style("opacity", 0.1)
            .call(yAxisGrid);

        // Naming the x and y axises
        svg.append("text")
            .attr("class", "x label")
            .attr("text-anchor", "end")
            .attr("x", width - 50)
            .attr("y", height - 60)
            .text("Longitude →");

        svg.append("text")
            .attr("class", "y label")
            .attr("text-anchor", "end")
            .attr("y", -6)
            .attr("x", 20)
            .text("↑ Latitude");

        //Graphing the dots
        var dots = svg.append("g").selectAll("dot").data(data);
        dots.enter()
            .append("circle")
            .attr("cx", function(d) {
                xScale.domain([xMax, xMin]);
                return xScale(d.Longitude);
            })
            .attr("cy", function(d) {
                yScale.domain([yMin, yMax]);
                return yScale(d.Latitude);
            })
            .attr("r", 3).attr("fill", "none")
            .attr("stroke", "steelblue");
    });
});