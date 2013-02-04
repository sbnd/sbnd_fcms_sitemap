<h2>${pdata.title}</h2>
${pdata.body}

<br/><br/>
	
<!-- foreach(${map},v) -->
	<!-- if(${v.data}) -->
		<h3>${v.title}</h3>
		<!-- menu(${v.data},sitemap-menu.tpl) -->
	<!-- end -->
<!-- end -->