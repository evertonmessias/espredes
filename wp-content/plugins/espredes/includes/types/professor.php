<?php

function create_custom_post_type_professor()
{
	$labels = [
		'name' => _x('Professores', 'post type general name'),
		'singular_name' => _x('Professor', 'post type singular name'),
		'add_new' => _x('Adicionar', 'Professor'),
		'add_new_item' => __('Adicionar novo Professor'),
		'edit_item' => __('Editar Professor'),
		'new_item' => __('Nova Professor'),
		'view_item' => __('View Professor'),
		'search_items' => __('Search Professor'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	];
	$args = [
		'labels'				=> $labels,
		'supports'              => ['title', 'thumbnail' /*,'editor', 'author', 'excerpt'*/],
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'query_var' 			=> true,
		'menu_position'         => 4,
		'show_in_admin_bar'     => true,
		'rewrite' 				=> true,
		'show_in_nav_menus'     => true,
		'can_export'			=> true,
		'menu_icon'             => 'dashicons-businessman',
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'     	=> array('post', 'professor'),
		'map_meta_cap'        => true,
	];
	register_post_type('professor', $args);
}
add_action('init', 'create_custom_post_type_professor');


//Add in submenu
function type_professor()
{
	//add_submenu_page('espredes', 'Professores', 'Professores', 'edit_posts', 'edit.php?post_type=professor');
}
add_action('admin_menu', 'type_professor');


//Roles for Admin, Editor
function role_caps_professor()
{
	$roles = array('editor', 'administrator');
	foreach ($roles as $the_role) {
		$role = get_role($the_role);
		$role->add_cap('read_professor');
		$role->add_cap('read_private_professor');
		$role->add_cap('edit_professor');
		$role->add_cap('edit_others_professor');
		$role->add_cap('edit_published_professor');
		$role->add_cap('publish_professor');
		$role->add_cap('delete_others_professor');
		$role->add_cap('delete_private_professor');
		$role->add_cap('delete_published_professor');
	}
}
add_action('admin_init', 'role_caps_professor', 999);


// POSTMETA ************************************************

// URL **********************************

function field_box_professor_url()
{
    add_meta_box('professor_url_id', 'URL do Professor', 'field_professor_url', 'professor','professor_url','high',null);
}
add_action('add_meta_boxes', 'field_box_professor_url');

function field_professor_url($post)
{
    $value = get_post_meta($post->ID, 'professor_url', true);
?>
    <input class="postmeta-professor" type="text" name="professor_url" value="<?php echo $value; ?>">
<?php
}

function move_postmeta_to_top_url() {
    global $post, $wp_meta_boxes;
    do_meta_boxes( get_current_screen(), 'professor_url', $post );
    unset($wp_meta_boxes['post']['professor_url']);
}
add_action('edit_form_after_title', 'move_postmeta_to_top_url');


// Local **********************************

function field_box_professor_local()
{
    add_meta_box('professor_local_id', 'Local do Professor', 'field_professor_local', 'professor','professor_local','high',null);
}
add_action('add_meta_boxes', 'field_box_professor_local');

function field_professor_local($post)
{
    $value = get_post_meta($post->ID, 'professor_local', true);
?>
    <input class="postmeta-professor" type="text" name="professor_local" value="<?php echo $value; ?>">
<?php
}

function move_postmeta_to_top_local() {
    global $post, $wp_meta_boxes;
    do_meta_boxes( get_current_screen(), 'professor_local', $post );
    unset($wp_meta_boxes['post']['professor_local']);
}
add_action('edit_form_after_title', 'move_postmeta_to_top_local');


// SAVE ALL **********************************

function save_postmeta_professor($post_id)
{
    if (isset($_POST['professor_url'])) {
        $professor_url = sanitize_text_field($_POST['professor_url']);
        update_post_meta($post_id, 'professor_url', $professor_url);
    } 
	if (isset($_POST['professor_local'])) {
        $professor_local = sanitize_text_field($_POST['professor_local']);
        update_post_meta($post_id, 'professor_local', $professor_local);
    }     
}
add_action('save_post', 'save_postmeta_professor');
