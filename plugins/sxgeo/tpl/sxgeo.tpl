# Admin Tools TPL file for SxGeo IP base plugin
<!-- BEGIN: MAIN -->
<div class="block">
	<ul>
		<li>{PHP.L.sx_your1} {PHP.L.Ip}: {PHP.sx_ip} <!-- IF {PHP.sx_debug_local} -->({PHP.L.sx_localmode})<!-- ENDIF --></li>
		<li>{PHP.L.sx_your2} {PHP.L.Country}: {PHP.sx_country.name}</li>
		<li>{PHP.L.sx_iso_code}: {PHP.sx_country.iso}</li>
		<li>
			{PHP.L.City}:
			<!-- IF {PHP.sx.cityTitle} -->{PHP.sx.cityTitle}<!-- ELSE -->{PHP.L.sx_na}<!-- ENDIF -->
		</li>
		<li>{PHP.L.sx_lat}: {PHP.sx.city.city.lat}</li>
		<li>{PHP.L.sx_lon}: {PHP.sx.city.city.lon}</li>
		<!-- IF {PHP.sx_toolsmode} -->
		<li>City info array: {PHP.sx.city_txt}</li>
		<li>City extended info array: {PHP.sx.city_ext_txt}</li>
		<!-- ENDIF -->
	</ul>
</div>
<!-- END: MAIN -->