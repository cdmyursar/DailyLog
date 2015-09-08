var selNailFile = document.getElementById("nailfile");
var selTeeth = document.getElementById("teethbrush");
var selDematt = document.getElementById("dematt");
var selDeskunk = document.getElementById("deskunk");
var selFleaShampoo = document.getElementById("flea");
var selShampoo = document.getElementsByClassName("shampoo");
var selDeshed = document.getElementsByClassName("deshed");
var selFlea = document.getElementsByClassName("flea");
var txtarea = document.getElementById("txtarea").innerHTML;  
var parsTxtArea = txtarea.split("\n");
var checkAddons = txtarea.indexOf("--ADDONS--");
var checkInstructions = txtarea.indexOf("--INSTRUCTIONS--");

//
//check txtarea for "addons" if not found, add it
//if(checkInstructions == "-1"){
//    document.getElementById("txtarea").innerHTML +="\n\n--INSTRUCTIONS--";             
//}
if(checkAddons == "-1"){
    document.getElementById("txtarea").innerHTML +="\n\n--ADDONS--";             
}

//parse textarea for any addons listed, set checkboxs or selectors to 
//proper state, example checkboxs checked or not, options selected on correct value
//Nail File
for(var j=0;j< parsTxtArea.length; j++){   
    if(parsTxtArea[j]===selNailFile.value){
        selNailFile.checked = 1;   
    }
    if(parsTxtArea[j]===selTeeth.value){
        selTeeth.checked = 1;
    }
    if(parsTxtArea[j]===selDematt.value){
        selDematt.checked = 1;
    }
    if(parsTxtArea[j]===selDeskunk.value){
        selDeskunk.checked = 1;
    }
    if(parsTxtArea[j]===selFleaShampoo.value){
        selFleaShampoo.checked = 1;
    }
}

//check if Nail File was checked inside Kennel Connection, if true add to txtarea.
//if(selNailFile.checked){
//        document.getElementById("txtarea").value +="\n"+selNailFile.value;                               
//}

//Check if any of the addons are listed in txtarea, then set the correct addon
// example checkbox checked or option selected
//shampoo
for(var j = 0;j< parsTxtArea.length; j++){   
    for(var t = 0;t<selShampoo.length;t++){
        if(parsTxtArea[j]===selShampoo[t].value){
            selShampoo[t].selected = 'selected';
        }
    }
    //deshed
    for(var t = 0;t<selDeshed.length;t++){
        if(parsTxtArea[j]===selDeshed[t].value){
            selDeshed[t].selected = 'selected';
        }
    }
    //fleaDip
    for(var t = 0;t<selFlea.length;t++){
        if(parsTxtArea[j]===selFlea[t].value){
            selFlea[t].selected = 'selected';
        }
    }
}

//modify txtarea when selectors are changed
//Nail File checkbox
//checkboxs write to txtarea from here, editTxtAreaCheck() only removes 
//from txtarea when unchecked
//NailFile checkbox
function nailFileSelect(){
    if(selNailFile.checked){
        document.getElementById("txtarea").value +="\n"+selNailFile.value;                               
    }else{
        editTxtAreaCheck(selNailFile.value);
    }
}
//Teethbrush checkbox
function teethSelect(){
     if(selTeeth.checked){
        document.getElementById("txtarea").value +="\n"+selTeeth.value;                               
    }else{
        editTxtAreaCheck(selTeeth.value);
    }
}
//Dematt checkbox
function demattSelect(){
    if(selDematt.checked){
        document.getElementById("txtarea").value +="\n"+selDematt.value;                               
    }else{
        editTxtAreaCheck(selDematt.value);
    }
}   
//Deskunk checkbox
function deskunkSelect(){
    if(selDeskunk.checked){
        document.getElementById("txtarea").value +="\n"+selDeskunk.value;                               
    }else{
        editTxtAreaCheck(selDeskunk.value);
    }
}   
//Flea Shampoo checkbox
function fleaSelect(){
    if(selFleaShampoo.checked){
        document.getElementById("txtarea").value +="\n"+selFleaShampoo.value;                               
    }else{
        editTxtAreaCheck(selFleaShampoo.value);
    }
}

//modify txtarea when option is selected. options are deleted from txtarea from
//the use of editTxtArea();
//deshed selector
function deshedSelect(){
    //Get user selected deshed
    for(var i=0; i<selDeshed.length;i++){
        if(selDeshed[i].selected){
            editTxtArea(selDeshed[i].value, selDeshed);
        }
    }
}  
//shampoo selector
function shampooSelect() {        
    //Get user selected shampoo
    for(var i=0; i<selShampoo.length;i++){
        if(selShampoo[i].selected){
            editTxtArea(selShampoo[i].value, selShampoo);
        }
    }
}
//fleadip selector
function fleaDipSelect() {        
    //Get user selected flea dip
    for(var i=0; i<selFlea.length;i++){
        if(selFlea[i].selected){
            editTxtArea(selFlea[i].value, selFlea);
        }
    }
}

//editTxtAreaCheck() will only remove values from txtarea when unselected
//used only with the checkboxs not options
function editTxtAreaCheck(data){
    var txtarea = document.getElementById("txtarea").value;  
    var txtsplit = txtarea.split('\n');
    for(var j=0;j< txtsplit.length; j++){
        if(txtsplit[j]===data){
            txtsplit.splice(j,1);
            var joinback = txtsplit.join("\n");
            document.getElementById("txtarea").value = joinback;                               
        }
    }
    
}
//editTxtArea()will remove and add values when options are selected
//only used with select options, example deshed options
function editTxtArea(value,data){
    var txtarea = document.getElementById("txtarea").value;  
    var txtsplit = txtarea.split('\n');
    //clear text area of any matching shampoos in the text area
    for(var j=0;j< txtsplit.length; j++){
        for(var t = 0;t<data.length;t++){
            if(txtsplit[j]===data[t].value){
                txtsplit.splice(j,1);
                var joinback = txtsplit.join("\n");
                document.getElementById("txtarea").value = joinback;                               
            }
        }
    }
    document.getElementById("txtarea").value +="\n"+value;                               
}

function jsFunction(){
    document.getElementById("txtarea").value +="\nALO";   
}