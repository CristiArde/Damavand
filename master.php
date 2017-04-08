<body>
	<div id="page">		
		<!--TODO: Migrate menu here-->
		<div>
			<?php
				 echo '<div id="'.$page_name.'-main" class="center">';
				 include($page_content); 
				 echo '</div>';
			?>
		</div>
	</div>
</body>
