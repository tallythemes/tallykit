<?php
//http://jonsaverda.com/2014/03/add-shortcode-add-media-button/
class acoc_tinymce_register {
	
	public $options;
	public $title;
	public $button_url;
	public $button_title;
	public $uid;

	function __construct($atts = array()) {
		$args = array_merge(array(
			'uid' => '',
			'button_title' => '',
			'button_url' => '',
			'title' => '',
			'options' => '',
		), $atts);
		
		$this->uid = $args['uid'];
		$this->button_title = $args['button_title'];
		$this->button_url = $args['button_url'];
		$this->title = $args['title'];
		$this->options = $args['options'];
		
		global $pagenow;
		if(in_array( $pagenow, array( 'post.php', 'page.php', 'post-new.php', 'post-edit.php'))){
			add_action( 'media_buttons', array( $this, 'media_buttons' ), 20 );
			add_action( 'admin_footer', array( $this, 'popup_html' ) );
		}
	}
	

	/*
	* Add a Shortcode button left side of the media button
	* *********************************************************/
	function media_buttons( $editor_id = 'content' ){
		$output = '<a href="#TB_inline?width=4000&amp;inlineId='.$this->uid.'" class="thickbox button" title="' . $this->title . '">' . $this->button_title . '</a>';
		echo $output;
	}
	
	
	/*
	* This the popup html output of the editor (Output the full HTML)
	* *********************************************************/
	function popup_html(){
		?>
        <script type="text/javascript">
			jQuery(document).ready(function($){
				$("#<?php echo $this->uid; ?> h3.acoc_tinymce_toggle_trigger").click(function(){$(this).toggleClass("active").next().slideToggle("fast");return false;});				
			});
		</script>
        <?php
		echo '<div style="display:none;">';
			echo '<div class="wrap" id="'.$this->uid.'">';
				if(is_array($this->options)):
					foreach($this->options as $options):
						$uid = 'acoc_tinymce_'.$this->uid.'_'.$options['shortcode'];
						$this->single_shortcode_html( $uid, $options );
					endforeach;
				endif;
			echo '</div>';
		echo '</div>';
	}
	
	

	/*
	* Generating the forms per shortcode
	*
	* @ This function is using in "single_shortcode_html" function
	* *********************************************************/
	function form($uid, $data){							 
		if(is_array($data['fields'])){
			foreach($data['fields'] as $field){
				$value = $field['std'];
				$field['id'] = $uid."_".$field['id'];
				$class_name = 'acoc_field_'.$field['type'];
				$field_class = new $class_name($field, $value);
				$field_class->html();
			}
		}
		
	}
	
	
	/*
	* Create shortcode form and javascript for each single shortcode
	*
	* @ This function is using in "popup_html" function
	* *********************************************************/
	function single_shortcode_html( $uid, $data ){
		?>
       <script type="text/javascript">
	   		
			function <?php echo $uid; ?>_insertTemplate() {					
				<?php $this->shortcode_ja_vars($uid, $data); ?>
				/** Send shortcode to editor */
				<?php if($data['content'] == 'yes'): ?>
					window.send_to_editor('[<?php echo $data['shortcode']; ?> <?php echo $this->shortcode_arguments($uid, $data); ?>]<?php $this->field_content($uid, $data); ?>[/<?php echo $data['shortcode']; ?>]');
				<?php else: ?>
					window.send_to_editor('[<?php echo $data['shortcode']; ?> <?php echo $this->shortcode_arguments($uid, $data); ?> /]');
				<?php endif; ?>
			}
		</script>
        <div class="acoc_tinymce_shortcode_holder">
			<h3 class="acoc_tinymce_toggle_trigger"><?php echo $data['title']; ?></h3>
            <div class="acoc_tinymce_shortcode_fields">
				<?php echo $this->form($uid, $data); ?>
				<input type="button" class="button-primary" value="<?php _e('insert', 'acoc_textdomain'); ?>" onclick="<?php echo $uid; ?>_insertTemplate();"/>
				&nbsp;&nbsp;&nbsp;
				<a class="button" style="color:#bbb;" href="#" onclick="tb_remove(); return false;"><?php _e("Cancel", "acoc_textdomain"); ?></a>
			</div>
		</div>
        <?php	
	}
	
	
	/*
	* This function create shortcode's arguments
	*
	* @ This function is using in "single_shortcode_html" function
	* *********************************************************/
	function shortcode_arguments($uid, $data){
		$options = $data;
				
		if(is_array($options['fields'])){
			foreach($options['fields'] as $option){				
				if( isset($option['content']) && ($option['content'] == 'yes') ){
					
				}else{
					echo "".$option['id']."=\"'+".$uid."_".$option['id']."+'\" ";	
				}
			}
		}
	}
	
	
	/*
	* This function JavaScript "var" to collect the data from html form
	*
	* @ This function is using in "single_shortcode_html" function
	* *********************************************************/
	function shortcode_ja_vars($uid, $data){
		$options = $data;
		//print_r($options['fields'] );
		if(is_array($options['fields'])){
			foreach($options['fields'] as $option){
				echo "var ".$uid."_".$option['id']." = jQuery( '#".$uid."_".$option['id']."' ).val(); ";
			}
		}
	}
	
	
	/*
	* This function create the "content" argument
	*
	* @ This function is using in "single_shortcode_html" function
	* *********************************************************/
	function field_content($uid, $data){
		$options = $data;
		
		if(is_array($options['fields'])){
			foreach($options['fields'] as $option){
				if(isset($option['content'])){		
					if( $option['content'] == 'yes' ){ echo "'+".$uid."_".$option['id']."+'"; }
				}
			}
		}
	}
	
}