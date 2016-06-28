<?php

	$origem = $_POST['origem'];
	$destino = $_POST['destino'];

	if ( (empty($origem)) || (empty($destino)) )
	{
		header("location:http://vinho/testes_luciano/form_ori_dest.html");
	}

?>

<html>
<head>
<title>Rota da Mercadoria</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="js/gmap3.js"></script>
<style>
	body {
		text-align: center;
		font-family: Arial, sans-serif;
	}
	.gmap3 {
		margin: 20px auto;
		border: 1px dashed #C0C0C0;
		width: 700px;
		height: 500px;
	}
</style>

<script type="text/javascript">

 $(function(){

 	// # Gera Mapa A -> B
 	// # Calcula distancia A -> B

	$("#mapa").gmap3({
		getroute:{
		    options:{
		        origin:"<?php echo $origem;?>",
		        destination:"<?php echo $destino;?>",
		        travelMode: google.maps.DirectionsTravelMode.DRIVING
		    },
		    callback: function(results){	      
		      if (!results) return;
		      $(this).gmap3({
		        map:{
		          options:{
		            zoom: 13,  
		            center: [0, -180]
		          }
		        },
		        directionsrenderer:{
		          options:{
		            directions:results
		          } 
		        }
		      });
		    }
	  	},
	  	getdistance:{
		    options:{ 
		      origins:"<?php echo $origem;?>", 
		      destinations:"<?php echo $destino;?>",
		      travelMode: google.maps.TravelMode.DRIVING
		    },
		    callback: function(results, status){
		      var html = "";
		      if (results){
		        for (var i = 0; i < results.rows.length; i++){
		          var elements = results.rows[i].elements;
		          for(var j=0; j<elements.length; j++){
		            switch(elements[j].status){
		              case "OK":
		                html += elements[j].distance.text + " (" + elements[j].duration.text + ")<br />";
		                break;
		              case "NOT_FOUND":
		                html += "The origin and/or destination of this pairing could not be geocoded<br />";
		                break;
		              case "ZERO_RESULTS":
		                html += "No route could be found between the origin and destination.<br />";
		                break;
		            }
		          }
		        } 
		      } 
		      else{
		        html = "error";
		      }
		      $("#distAB").html( 'Distancia de Origem (A) ao Destino (B) => ' + html );
			}
	  	}
	});
});

</script>

</head>
<body>
	<h1>Rota da Mercadoria</h1>
	<div id="mapa" class="gmap3"></div>
	<div id="distAB"></div>
</body>
</html>