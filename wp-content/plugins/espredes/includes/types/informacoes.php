<?php

function create_custom_post_type_informacoes()
{
	$labels = [
		'name' => _x('Informações', 'post type general name'),
		'singular_name' => _x('Informações', 'post type singular name'),
		'add_new' => _x('Adicionar', 'Informações'),
		'add_new_item' => __('Adicionar novo Informações'),
		'edit_item' => __('Editar Informações'),
		'new_item' => __('Nova Informações'),
		'view_item' => __('View Informações'),
		'search_items' => __('Search Informações'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	];
	$args = [
		'labels'				=> $labels,
		'supports'              => ['title', 'editor', 'thumbnail'/*, 'author', 'excerpt'*/],
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => false,
		'query_var' 			=> true,
		'menu_position'         => 1,
		'show_in_admin_bar'     => true,
		'rewrite' 				=> true,
		'show_in_nav_menus'     => true,
		'can_export'			=> true,
		//'menu_icon'             => 'dashicons-businessperson',
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'     	=> array('post', 'informacoes'),
		'map_meta_cap'        => true,
	];
	register_post_type('informacoes', $args);
}
add_action('init', 'create_custom_post_type_informacoes');


//Add in submenu
function type_informacoes()
{
	add_submenu_page('espredes', 'Informacões', 'Informacões', 'edit_posts', 'edit.php?post_type=informacoes');
}
add_action('admin_menu', 'type_informacoes');


//Roles for Admin, Editor
function role_caps_informacoes()
{
	$roles = array('editor', 'administrator');
	foreach ($roles as $the_role) {
		$role = get_role($the_role);
		$role->add_cap('read_informacoes');
		$role->add_cap('read_private_informacoes');
		$role->add_cap('edit_informacoes');
		$role->add_cap('edit_others_informacoes');
		$role->add_cap('edit_published_informacoes');
		$role->add_cap('publish_informacoes');
		$role->remove_cap('delete_others_informacoes');
		$role->remove_cap('delete_private_informacoes');
		$role->remove_cap('delete_published_informacoes');
	}
}
add_action('admin_init', 'role_caps_informacoes', 999);


// POSTMETA ************************************************

// Icon **********************************

function field_box_informacoes_icone()
{
    add_meta_box('informacoes_icone_id', 'Icone', 'field_informacoes_icone', 'informacoes','informacoes_icone','high',null);
}
add_action('add_meta_boxes', 'field_box_informacoes_icone');

function field_informacoes_icone($post)
{
    $value = get_post_meta($post->ID, 'informacoes_icone', true);
?>
    <input class="postmeta-informacoes" type="text" name="informacoes_icone" value="<?php echo $value; ?>"><i class="<?php echo get_post_meta($post->ID, 'informacoes_icone', true); ?>"></i>
	<p>Escolha o Icone <a target="_blank" href="https://remixicon.com/">aqui</a></p>
<?php
}

function move_postmeta_to_top_informacoes() {
    global $post, $wp_meta_boxes;
    do_meta_boxes( get_current_screen(), 'informacoes_icone', $post );
    unset($wp_meta_boxes['post']['informacoes_icone']);
}
add_action('edit_form_after_title', 'move_postmeta_to_top_informacoes');


// SAVE ALL **********************************

function save_postmeta_informacoes($post_id)
{
    if (isset($_POST['informacoes_icone'])) {
        $informacoes_icone = sanitize_text_field($_POST['informacoes_icone']);
        update_post_meta($post_id, 'informacoes_icone', $informacoes_icone);
    }   
}
add_action('save_post', 'save_postmeta_informacoes');
