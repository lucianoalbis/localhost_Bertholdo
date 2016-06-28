//http://v6.gmap3.net/en/catalog/10-overlays/circle-36
//http://v6.gmap3.net/en/catalog/14-services/getgeoloc-54
<?php $cidade = "Nova Lima, Brasil"; ?>
<?php
function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2) {
	// Calculate the distance in degrees
	$degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
 
	// Convert the distance in degrees to the chosen unit (kilometres, miles or nautical miles)
	switch($unit) {
		case 'km':
			$distance = $degrees * 111.13384; // 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km)
			break;
		case 'mi':
			$distance = $degrees * 69.05482; // 1 degree = 69.05482 miles, based on the average diameter of the Earth (7,913.1 miles)
			break;
		case 'nmi':
			$distance =  $degrees * 59.97662; // 1 degree = 59.97662 nautic miles, based on the average diameter of the Earth (6,876.3 nautical miles)
	}
	return round($distance, $decimals);
}

//echo '<br/>'.distanceCalculation(-19.981090, -43.860976, -19.992748, -43.848560) . " Kilometers<br>";

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
#balao {
	width: 370px;
	height: 110px;
	padding: 5px;
}
#balao p {
	margin: 0;
	text-align: left;
	float: left;
}
#balao img {
	display: block;
	float: left;
	padding-right: 10px;
}
.gmap3 {
	margin: 20px auto;
	border: 1px dashed #C0C0C0;
	width: 700px;
	height: 500px;
}
</style>
<script type="text/javascript">
// inicializa jquery
 $(function(){
		
		// conteudo das infowindows 
		var origemCarga = '<div id="balao">'+
		 						'<img src="imagens/logo.png" />'+
  								'<p><strong>Origem da Carga - SENAI</strong></p>'+    							
						   '</div>';
		     
		var destinoCarga = '<div id="balao">'+
		 						'<img src="imagens/logo.png" />'+
  								'<p><strong>Destino da Carga - SEBRAE</strong></p>'+
							'</div>';	 
								 						
// inicializa plugin gmap3			 
$("#mapa").gmap3({
	getroute:{
	    options:{
	        origin:"Escola Técnica de Formação Gerencial SEBRAE Nova Lima - Rua José R Nonato Couto - Retiro, Nova Lima - MG",
	        destination:"SENAI - Centro, Nova Lima - MG",
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
  	}
  }); 
});     
</script>
</head>
<body>
<h1>Rota da Mercadoria</h1>
<div id="mapa" class="gmap3"></div>
</body>
</html>