$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function() {
    var root =
{
  "flare": {
    "analytics": {
      "cluster": {
        "AgglomerativeCluster": 3938,
        "CommunityStructure": 3812,
        "HierarchicalCluster": 6714,
        "MergeEdge": 743
      },
      "graph": {
        "BetweennessCentrality": 3534,
        "LinkDistance": 5731,
        "MaxFlowMinCut": 7840,
        "ShortestPaths": 5914,
        "SpanningTree": 3416
      },
      "optimization": {
        "AspectRatioBanker": 7074
      }
    },
    "animate": {
      "Easing": 17010,
      "FunctionSequence": 5842,
      "interpolate": {
        "ArrayInterpolator": 1983,
        "ColorInterpolator": 2047,
        "DateInterpolator": 1375,
        "Interpolator": 8746,
        "MatrixInterpolator": 2202,
        "NumberInterpolator": 1382,
        "ObjectInterpolator": 1629,
        "PointInterpolator": 1675,
        "RectangleInterpolator": 2042
      },
      "ISchedulable": 1041,
      "Parallel": 5176,
      "Pause": 449,
      "Scheduler": 5593,
      "Sequence": 5534,
      "Transition": 9201,
      "Transitioner": 19975,
      "TransitionEvent": 1116,
      "Tween": 6006
    },
    "data": {
      "converters": {
        "Converters": 721,
        "DelimitedTextConverter": 4294,
        "GraphMLConverter": 9800,
        "IDataConverter": 1314,
        "JSONConverter": 2220
      },
      "DataField": 1759,
      "DataSchema": 2165,
      "DataSet": 586,
      "DataSource": 3331,
      "DataTable": 772,
      "DataUtil": 3322
    },
    "display": {
      "DirtySprite": 8833,
      "LineSprite": 1732,
      "RectSprite": 3623,
      "TextSprite": 10066
    },
    "flex": {
      "FlareVis": 4116
    },
    "physics": {
      "DragForce": 1082,
      "GravityForce": 1336,
      "IForce": 319,
      "NBodyForce": 10498,
      "Particle": 2822,
      "Simulation": 9983,
      "Spring": 2213,
      "SpringForce": 1681
    },
    "query": {
      "AggregateExpression": 1616,
      "And": 1027,
      "Arithmetic": 3891,
      "Average": 891,
      "BinaryExpression": 2893,
      "Comparison": 5103,
      "CompositeExpression": 3677,
      "Count": 781,
      "DateUtil": 4141,
      "Distinct": 933,
      "Expression": 5130,
      "ExpressionIterator": 3617,
      "Fn": 3240,
      "If": 2732,
      "IsA": 2039,
      "Literal": 1214,
      "Match": 3748,
      "Maximum": 843,
      "methods": {
        "add": 593,
        "and": 330,
        "average": 287,
        "count": 277,
        "distinct": 292,
        "div": 595,
        "eq": 594,
        "fn": 460,
        "gt": 603,
        "gte": 625,
        "iff": 748,
        "isa": 461,
        "lt": 597,
        "lte": 619,
        "max": 283,
        "min": 283,
        "mod": 591,
        "mul": 603,
        "neq": 599,
        "not": 386,
        "or": 323,
        "orderby": 307,
        "range": 772,
        "select": 296,
        "stddev": 363,
        "sub": 600,
        "sum": 280,
        "update": 307,
        "variance": 335,
        "where": 299,
        "xor": 354,
        "_": 264
      },
      "Minimum": 843,
      "Not": 1554,
      "Or": 970,
      "Query": 13896,
      "Range": 1594,
      "StringUtil": 4130,
      "Sum": 791,
      "Variable": 1124,
      "Variance": 1876,
      "Xor": 1101
    },
    "scale": {
      "IScaleMap": 2105,
      "LinearScale": 1316,
      "LogScale": 3151,
      "OrdinalScale": 3770,
      "QuantileScale": 2435,
      "QuantitativeScale": 4839,
      "RootScale": 1756,
      "Scale": 4268,
      "ScaleType": 1821,
      "TimeScale": 5833
    },
    "util": {
      "Arrays": 8258,
      "Colors": 10001,
      "Dates": 8217,
      "Displays": 12555,
      "Filter": 2324,
      "Geometry": 10993,
      "heap": {
        "FibonacciHeap": 9354,
        "HeapNode": 1233
      },
      "IEvaluable": 335,
      "IPredicate": 383,
      "IValueProxy": 874,
      "math": {
        "DenseMatrix": 3165,
        "IMatrix": 2815,
        "SparseMatrix": 3366
      },
      "Maths": 17705,
      "Orientation": 1486,
      "palette": {
        "ColorPalette": 6367,
        "Palette": 1229,
        "ShapePalette": 2059,
        "SizePalette": 2291
      },
      "Property": 5559,
      "Shapes": 19118,
      "Sort": 6887,
      "Stats": 6557,
      "Strings": 22026
    },
    "vis": {
      "axis": {
        "Axes": 1302,
        "Axis": 24593,
        "AxisGridLine": 652,
        "AxisLabel": 636,
        "CartesianAxes": 6703
      },
      "controls": {
        "AnchorControl": 2138,
        "ClickControl": 3824,
        "Control": 1353,
        "ControlList": 4665,
        "DragControl": 2649,
        "ExpandControl": 2832,
        "HoverControl": 4896,
        "IControl": 763,
        "PanZoomControl": 5222,
        "SelectionControl": 7862,
        "TooltipControl": 8435
      },
      "data": {
        "Data": 20544,
        "DataList": 19788,
        "DataSprite": 10349,
        "EdgeSprite": 3301,
        "NodeSprite": 19382,
        "render": {
          "ArrowType": 698,
          "EdgeRenderer": 5569,
          "IRenderer": 353,
          "ShapeRenderer": 2247
        },
        "ScaleBinding": 11275,
        "Tree": 7147,
        "TreeBuilder": 9930
      },
      "events": {
        "DataEvent": 2313,
        "SelectionEvent": 1880,
        "TooltipEvent": 1701,
        "VisualizationEvent": 1117
      },
      "legend": {
        "Legend": 20859,
        "LegendItem": 4614,
        "LegendRange": 10530
      },
      "operator": {
        "distortion": {
          "BifocalDistortion": 4461,
          "Distortion": 6314,
          "FisheyeDistortion": 3444
        },
        "encoder": {
          "ColorEncoder": 3179,
          "Encoder": 4060,
          "PropertyEncoder": 4138,
          "ShapeEncoder": 1690,
          "SizeEncoder": 1830
        },
        "filter": {
          "FisheyeTreeFilter": 5219,
          "GraphDistanceFilter": 3165,
          "VisibilityFilter": 3509
        },
        "IOperator": 1286,
        "label": {
          "Labeler": 9956,
          "RadialLabeler": 3899,
          "StackedAreaLabeler": 3202
        },
        "layout": {
          "AxisLayout": 6725,
          "BundledEdgeRouter": 3727,
          "CircleLayout": 9317,
          "CirclePackingLayout": 12003,
          "DendrogramLayout": 4853,
          "ForceDirectedLayout": 8411,
          "IcicleTreeLayout": 4864,
          "IndentedTreeLayout": 3174,
          "Layout": 7881,
          "NodeLinkTreeLayout": 12870,
          "PieLayout": 2728,
          "RadialTreeLayout": 12348,
          "RandomLayout": 870,
          "StackedAreaLayout": 9121,
          "TreeMapLayout": 9191
        },
        "Operator": 2490,
        "OperatorList": 5248,
        "OperatorSequence": 4190,
        "OperatorSwitch": 2581,
        "SortOperator": 2023
      },
      "Visualization": 16540
    }
  }
};

var width = 960,
    height = 500;

var x = d3.scale.linear()
    .range([0, width]);

var y = d3.scale.linear()
    .range([0, height]);

var color = d3.scale.category20c();

var partition = d3.layout.partition()
    .children(function(d) { return isNaN(d.value) ? d3.entries(d.value) : null; })
    .value(function(d) { return d.value; });

// define the zoomListener which calls the zoom function on the "zoom" event constrained within the scaleExtents
var zoomListener = d3.behavior.zoom().scaleExtent([0.1, 3]).on("zoom", zoom);

var svg = d3.select("body").append("svg")
    .attr("width", width)
    .attr("height", height)
    .call(zoomListener);

var rect = svg.selectAll("rect");

//d3.json("readme.json", function(error, root) {
  rect = rect
      .data(partition(d3.entries(root)[0]))
    .enter().append("rect")
      .attr("x", function(d) { return x(d.x); })
      .attr("y", function(d) { return y(d.y); })
      .attr("width", function(d) { return x(d.dx); })
      .attr("height", function(d) { return y(d.dy); })
      .attr("fill", function(d) { return color((d.children ? d : d.parent).key); })
      .on("click", clicked);
//});

function clicked(d) {
  x.domain([d.x, d.x + d.dx]);
  y.domain([d.y, 1]).range([d.y ? 20 : 0, height]);
  console.log(d.y);

  rect.transition()
      .duration(750)
      .attr("x", function(d) { return x(d.x); })
      .attr("y", function(d) { return y(d.y); })
      .attr("width", function(d) { return x(d.x + d.dx) - x(d.x); })
      .attr("height", function(d) { return y(d.y + d.dy) - y(d.y); });
}

function zoom() {
    d3.selectAll("rect").attr("transform", "translate(" + d3.event.translate + ")scale(" + d3.event.scale + ")");
    }

d3.select("#reset")
    .on("click",resetZoom);

function resetZoom() {
    x.domain([0,1]);
    y.domain([0,1]);
    zoomListener.scale(1);
    zoomListener.translate([0, 0]);
    d3.selectAll("rect")
        .transition().duration(750)
        .attr("x", function(d) { return x(d.x); })
        .attr("y", function(d) { return y(d.y); })
        .attr("width", function(d) { return x(d.x + d.dx) - x(d.x); })
        .attr("height", function(d) { return y(d.y + d.dy) - y(d.y); })
        .attr('transform', 'translate(' + zoomListener.translate() + ') scale(' + zoomListener.scale() + ')');


};
});

function show(){
    document.getElementById("spinner-back").classList.add("show");
    document.getElementById("spinner-front").classList.add("show");
}
function hide(){
    document.getElementById("spinner-back").classList.remove("show");
    document.getElementById("spinner-front").classList.remove("show");
}
