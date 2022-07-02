<?php

function create_custom_post_type_disciplina()
{
	$labels = [
		'name' => _x('Disciplinas', 'post type general name'),
		'singular_name' => _x('Disciplina', 'post type singular name'),
		'add_new' => _x('Adicionar', 'Disciplina'),
		'add_new_item' => __('Adicionar nova Disciplina'),
		'edit_item' => __('Editar Disciplina'),
		'new_item' => __('Nova Disciplina'),
		'view_item' => __('View Disciplina'),
		'search_items' => __('Search Disciplina'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	];
	$args = [
		'labels'				=> $labels,
		'supports'              => ['title', 'editor'/*, 'thumbnail', 'author', 'excerpt'*/],
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
		'capability_type'     	=> array('post', 'disciplina'),
		'map_meta_cap'        => true,
	];
	register_post_type('disciplina', $args);
}
add_action('init', 'create_custom_post_type_disciplina');


//Add in submenu
function type_disciplina()
{
	add_submenu_page('espredes', 'Disciplinas', 'Disciplinas', 'edit_posts', 'edit.php?post_type=disciplina');
}
add_action('admin_menu', 'type_disciplina');


//Roles for Admin, Editor
function role_caps_disciplina()
{
	$roles = array('editor', 'administrator');
	foreach ($roles as $the_role) {
		$role = get_role($the_role);
		$role->add_cap('read_disciplina');
		$role->add_cap('read_private_disciplina');
		$role->add_cap('edit_disciplina');
		$role->add_cap('edit_others_disciplina');
		$role->add_cap('edit_published_disciplina');
		$role->add_cap('publish_disciplina');
		$role->add_cap('delete_others_disciplina');
		$role->add_cap('delete_private_disciplina');
		$role->add_cap('delete_published_disciplina');
	}
}
add_action('admin_init', 'role_caps_disciplina', 999);


// POSTMETA ************************************************

// Professor **********************************

function field_box_disciplina_professor()
{
    add_meta_box('disciplina_professor_id', 'Professor(es)', 'field_disciplina_professor', 'disciplina','disciplina_professor','high',null);
}
add_action('add_meta_boxes', 'field_box_disciplina_professor');

function field_disciplina_professor($post)
{
    $value = get_post_meta($post->ID, 'disciplina_professor', true);
?>
    <input class="postmeta-disciplina" type="text" name="disciplina_professor" value="<?php echo $value; ?>">
<?php
}

function move_postmeta_to_top_disciplina() {
    global $post, $wp_meta_boxes;
    do_meta_boxes( get_current_screen(), 'disciplina_professor', $post );
    unset($wp_meta_boxes['post']['disciplina_professor']);
}
add_action('edit_form_after_title', 'move_postmeta_to_top_disciplina');


// Carga Horária **********************************

function field_box_disciplina_carga()
{
    add_meta_box('disciplina_carga_id', 'Carga Horária', 'field_disciplina_carga', 'disciplina','disciplina_carga','high',null);
}
add_action('add_meta_boxes', 'field_box_disciplina_carga');

function field_disciplina_carga($post)
{
    $value = get_post_meta($post->ID, 'disciplina_carga', true);
?>
    <input class="postmeta-disciplina" type="number" name="disciplina_carga" value="<?php echo $value; ?>">
<?php
}

function move_postmeta_to_top_carga() {
    global $post, $wp_meta_boxes;
    do_meta_boxes( get_current_screen(), 'disciplina_carga', $post );
    unset($wp_meta_boxes['post']['disciplina_carga']);
}
add_action('edit_form_after_title', 'move_postmeta_to_top_carga');


// SAVE ALL **********************************

function save_postmeta_disciplina($post_id)
{
    if (isset($_POST['disciplina_professor'])) {
        $disciplina_professor = sanitize_text_field($_POST['disciplina_professor']);
        update_post_meta($post_id, 'disciplina_professor', $disciplina_professor);
    } 
	if (isset($_POST['disciplina_carga'])) {
        $disciplina_carga = sanitize_text_field($_POST['disciplina_carga']);
        update_post_meta($post_id, 'disciplina_carga', $disciplina_carga);
    }     
}
add_action('save_post', 'save_postmeta_disciplina');
