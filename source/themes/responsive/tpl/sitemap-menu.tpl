<ul>
	<!-- foreach(${nodes},note) -->
		<li><a href="${note.href}" <!-- if(${note.current}) -->class="is_selected"<!-- end --> ${note.target}>${note.title}</a>
			${note.childs}
		</li> 
	<!-- end -->
</ul>