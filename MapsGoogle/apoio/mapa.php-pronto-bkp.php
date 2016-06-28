//https://ubilabs.github.io/geocomplete/

<?php

	$origem = $_POST['origem'];
	$destino = $_POST['destino'];

	echo "Origem: $origem </br> Destino: $destino";

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