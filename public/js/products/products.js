var $i = 0;
function tambah() {
  var $a = "<table><td><input type='file' id="+$i+" name='img_src[]' class='form-control'></td><td style='padding-left:20px'><input type='text' name='img_description[]' class='form-control' placeholder='description'/></td></table>";
  $("#tambah").append($a);
  $i++;
}

function deletes() {
  	var lastChild = document.getElementById("tambah").lastChild;
	var lastChildID = lastChild.id;
	console.log(lastChildID)
	document.getElementById("tambah").lastChild.remove();
}

function deleteEdit($i) {
  	var txt;
    var r = confirm("Are you sure?");
    if (r == true) {
        $varDel = document.getElementById("img-"+$i).attributes.path.nodeValue;
	  	$.getJSON(site_url+"/admin/products/deleteProductsImage?id="+$varDel, function(result){
	    })

	  	document.getElementById("img-"+$i).remove();
	  	document.getElementById("btn-"+$i).remove();
    } 
}