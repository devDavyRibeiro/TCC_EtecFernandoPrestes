<?php
	if ( !defined('ABSPATH') ) // Caminho absoluto para a pasta do sistema
		define('ABSPATH', dirname(__FILE__) . '/');
		
	/** caminho no server para o sistema **/
	if ( !defined('BASEURL') )
		define('BASEURL', '/marmoraria/'); /** pasta principal**/	

	define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
	define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');
	define('DATABASE', ABSPATH . 'inc/database.php');
	define('IMAGEM',BASEURL . 'produtos/' )
?>