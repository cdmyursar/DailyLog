var grooms = document.getElementById("groomDogs").value;
var baths = document.getElementById("bathDogs").value;
var nails = document.getElementById("nailsDogs").value;
var other = document.getElementById("otherDogs").value;
var tips = document.getElementById("tipTotal").value;
var groomingTotal = document.getElementById("groomingTotal").value;
var commissionTotal = document.getElementById("commissionTotal").value;

document.getElementById("commissionOP").innerHTML = groomingTotal;
document.getElementById("tipsOP").innerHTML = tips;
document.getElementById("totalOutPut").innerHTML = commissionTotal;

document.getElementById("groomsOP").innerHTML = grooms;
document.getElementById("bathsOP").innerHTML = baths;
document.getElementById("nailsOP").innerHTML = nails;
document.getElementById("othersOP").innerHTML = other;


    var data = [
            {
                    value: grooms,
                    color:"#d9534f",
                    highlight: "#FF5A5E",
                    label: "Grooms"
            },
            {
                    value: baths,
                    color: "#5bc0de",
                    highlight: "#5AD3D1",
                    label: "Baths"
            },
            {
                    value: nails,
                    color: "#f0ad4e",
                    highlight: "#FFC870",
                    label: "Nails"
            },
            {
                    value: other,
                    color: "#777",
                    highlight: "#A8B3C5",
                    label: "Other"
            }
    ];
    var options = {
        responsive : true,
        
    }
    window.onload = function(){
            var ctx = document.getElementById("chart-area").getContext("2d");
            var doughnutChartWithCustomLegend = new Chart(ctx).Doughnut(data,options);
            //window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, options);
            
    };

    