<?php
/*----------------------------------------------------
	Add Admin page for export import
-----------------------------------------------------*/
class tallykit_parallax_export_import{
	function __construct(){
		add_action( 'admin_menu', array($this, 'admin_page') );
		add_action( 'admin_enqueue_scripts', array($this, 'admin_script') );
	}
	
	function admin_script(){
		if(isset($_GET['page'])){
			if($_GET['page'] == 'tallykit-parallax-export-import'){
				wp_enqueue_style('thickbox');
				wp_enqueue_script('thickbox'); 
			}
		}
	}
	
	function admin_page(){
		add_menu_page(
			"Parallax - Export / Import", 
			"Parallax", 
			"manage_options", 
			"tallykit-parallax-export-import", 
			array($this, 'admin_page_html'), 
			"dashicons-share-alt", 
			"20.2"
		);
	}
	
	function admin_page_html(){
		$current_page = 'export'; 
	
		if(isset($_GET['tab'])){
			if($_GET['tab'] == 'import'){
				$current_page = 'import'; 
			}
		}
		?>
		<div class="wrap">
			<h2><?php _e('Parallax - Export / Import', 'tallykit_textdomain'); ?></h2>
			
			<h2 class="nav-tab-wrapper">
				<?php
					$export_active_tab_class = ($current_page == 'export') ? ' nav-tab-active' : ''; 
					$import_active_tab_class = ($current_page == 'import') ? ' nav-tab-active' : ''; 
				?>
				<a class='nav-tab <?php echo $export_active_tab_class; ?>' href='admin.php?page=tallykit-parallax-export-import&tab=export'>
					<?php _e('Export', 'tallykit_textdomain'); ?>
				</a>
				<a class='nav-tab <?php echo $import_active_tab_class; ?>' href='admin.php?page=tallykit-parallax-export-import&tab=import'>
					<?php _e('Import', 'tallykit_textdomain'); ?>
				</a>
			</h2>
			
			<?php 
				if($current_page == 'export'){
					$this->export_html();
				}elseif($current_page == 'import'){
					$this->import_html();
				}
			?>	
		</div>
		<?php
	}
	
	
	
	function export_html(){
		$the_query = new WP_Query( array('post_type' => 'page', 'posts_per_page' => -1) );
		?>
        <h3><?php _e('Export a page\'s Parallax Data', 'tallykit_textdomain'); ?></h3>
        <?php
		if ( $the_query->have_posts() ){
			while ($the_query->have_posts() ) { $the_query->the_post();
				$meta = get_post_meta(get_the_ID(), 'tallykit_parallax_sections', true);
				if(($meta != '') && is_array($meta)){
					echo '<p><div class="dashicons dashicons-media-code"></div><strong><a href="#TB_inline?width=4000&inlineId=tallykit_paralax_export_'.get_the_ID().'" class="thickbox" title="Export code for ::::'.get_the_title().':::: page">'.get_the_title().'</a></strong></p>';
					
					echo '<div class="" style="display:none;">';
						echo '<div id="tallykit_paralax_export_'.get_the_ID().'">';
							echo '<p>Copy the code below and save it in a .txt document for furure import.</p>';
							echo '<textarea style="height:200px; width:100%;" onclick="this.focus();this.select()" readonly="readonly">';
								echo acoc_encode( serialize( $meta ) );
							echo '</textarea>';
						echo '</div>';
					echo '</div>';
				}
			}
		}
		wp_reset_postdata();
	}
	
	
	function import_html(){
		$this->import_save();
		$the_query = new WP_Query( array('post_type' => 'page', 'posts_per_page' => -1) );
		?>
        <h3><?php _e('Import a page\'s Parallax Data', 'tallykit_textdomain'); ?></h3>
        <?php
		if ( $the_query->have_posts() ){
			echo '<form action="" method="post" name="tallykit_parallax_import" id="">';
				wp_nonce_field( 'tallykit_parallax_import_action', 'tallykit_parallax_import_name' );
				echo '<select name="tallykit_parallax_import_page_id">';
					echo '<option> - Select a Page to Import - </option>';
					while ($the_query->have_posts() ) { $the_query->the_post();
						echo '<option value="'.get_the_ID().'">'.get_the_title().'</option>';
					}
				echo '</select> Select a Page to Import.<br /> <br />';
				
				echo '<textarea name="tallykit_parallax_import_page_data" style="height:300px; width:500px;" onclick="this.focus();this.select()"></textarea><br /> <br />';
				
				echo '<input type="submit" name="Import" id="paralax_import" class="button button-primary button-large" value="Import">';
			echo '</form>';
		}
		wp_reset_postdata();
	}
	
	function import_save(){
		if ( ! isset( $_POST['tallykit_parallax_import_name'] ) ) return '';
		$nonce = $_POST['tallykit_parallax_import_name'];
		if ( ! wp_verify_nonce( $nonce, 'tallykit_parallax_import_action' ) ) return '';
		if ( ! current_user_can( 'manage_options' ) ) return '';
		$new_data = unserialize( acoc_decode( $_POST['tallykit_parallax_import_page_data']  ) );
		$update_data = update_post_meta($_POST['tallykit_parallax_import_page_id'], 'tallykit_parallax_sections', $new_data);
		
		if($update_data == true){ echo '<div id="message" class="updated fade below-h2" style="display: none;"><p>Import Successful..</p></div>'; }
		else{ echo '<div id="message" class="error fade below-h2" style="display: none;"><p>Import Error....</p></div>'; }
	}
}

new tallykit_parallax_export_import;