<?php
/**
 * Proporcionar una vista del área de administración para el complemento.
 *
 * Este archivo se utiliza para marcar los aspectos del complemento orientados al administrador.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 */
?>
<!-- Este archivo debe consistir principalmente en HTML con un poco de PHP. -->
<div class="notice notice-info is-dismissible inline">
	<p>
		<?php
		printf(
			esc_attr__('¡Gracias por usar nuestros servicios! Ahora el plugin está activado y listo para usar', 'WpAdminStyle')
		);
		?>
	</p>
</div>

<div class="wrap">
	<h1 class="titulo-superior"><?php esc_attr_e( 'Hagamos Marcas Latam', 'WpAdminStyle' ); ?></h1>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<!-- main content -->
			<div id="post-body-content">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<h2 class="titulo-cabecera"><span><?php esc_attr_e( 'Conócenos', 'WpAdminStyle' ); ?></span></h2>
						<div class="inside">
							<p class="inside-p"><?php esc_attr_e(
									'Somos una agencia de Marketing Digital con 6 años de experiencia en el mercado, que tiene alianzas estratégicas en Perú, Ecuador, Colombia, Chile, España y México. Contamos con un equipo altamente calificado para hacer realidad sus ideas.',
									'WpAdminStyle'
								); ?></p>
						</div>
						<!-- .inside -->
					</div>
					<!-- .postbox -->
				</div>
				<!-- .meta-box-sortables .ui-sortable -->
			</div>
			<!-- post-body-content -->
			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">
				<div class="meta-box-sortables">
					<div class="postbox">
						<h2><span><?php
						$member_ID = get_current_user_id();
                        $member_Info = get_userdata($member_ID);
                        $member_Login_Name = $member_Info->first_name;
                        $member_Login_Last = $member_Info->last_name;
                        if($member_Login_Name == ""){
                            $member_Login_Name = $member_Info->user_login;
                        }
                        $url_avatar = get_avatar_url($member_ID);
                        echo 'Hola '.$member_Login_Name.' '.$member_Login_Last.'<br>'.'<br>';
                        echo '<img alt="gravatar" src="'.$url_avatar.'">'.'<br>'.'<br>';
						esc_attr_e(
								'¿Necesitas soporte?', 'WpAdminStyle'
								); ?></span></h2>
						<div class="inside">
						    <a target="_blank" href="https://tawk.to/chat/5ff247f3df060f156a93f35e/1er56ij6n"><button type="button" class="button-primary">Chatear con un agente</button></a>
							<p><?php esc_attr_e(
									'',
									'WpAdminStyle'
								); ?></p>
						</div>
						<h2><span><?php esc_attr_e(
									'¿Quieres formar parte de nuestro equipo?', 'WpAdminStyle'
								); ?></span></h2>
						<div class="inside">
						    <a target="_blank" href="https://tawk.to/chat/5ff247f3df060f156a93f35e/1er56ij6n"><button type="button" class="button-primary">Plan de compensación</button></a>
							<p><?php esc_attr_e(
									'',
									'WpAdminStyle'
								); ?></p>
						</div>
						<!-- .inside -->
					</div>
					<!-- .postbox -->
				</div>
				<!-- .meta-box-sortables -->
			</div>
		</div>
	</div>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<!-- main content -->
			<div id="post-body-content">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<h2 class="titulo-cabecera"><span><?php esc_attr_e( '¿Quieres contratar alguno de nuestros servicios?', 'WpAdminStyle' ); ?></span></h2>
						<div class="inside">
						    Escribenos a este <a href="mailto:felis.dev@hagamosmarcas.com?subject=Quiero%20información%20de%20sus%20servicios.">correo.</a>
							<p><?php esc_attr_e(
									'',
									'WpAdminStyle'
								); ?></p>
						</div>
						<!-- .inside -->
					</div>
					<!-- .postbox -->
				</div>
				<!-- .meta-box-sortables .ui-sortable -->
			</div>
			<!-- post-body-content -->
			
			<!-- #postbox-container-1 .postbox-container -->
		</div>
		<!-- #post-body .metabox-holder .columns-2 -->
		<br class="clear">
	</div>
	<!-- #poststuff -->
</div> <!-- .wrap -->