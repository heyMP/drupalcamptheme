<?php

/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
function drupalcamppa_aurora_preprocess_maintenance_page(&$vars, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  // drupalcamppa_aurora_preprocess_html($variables, $hook);
  // drupalcamppa_aurora_preprocess_page($variables, $hook);

  // This preprocessor will also be used if the db is inactive. To ensure your
  // theme is used, add the following line to your settings.php file:
  // $conf['maintenance_theme'] = 'drupalcamppa_aurora';
  // Also, check $vars['db_is_active'] before doing any db queries.

}

/**
 * Implements hook_modernizr_load_alter().
 *
 * @return
 *   An array to be output as yepnope testObjects.
 */
/* -- Delete this line if you want to use this function
function drupalcamppa_aurora_modernizr_load_alter(&$load) {

}

/**
 * Implements hook_preprocess_html()
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function drupalcamppa_aurora_preprocess_html(&$vars) {

}

/**
 * Override or insert variables into the page template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function drupalcamppa_aurora_preprocess_page(&$vars) {
  $children = element_children($vars['page']['main_prefix']);
  $children_count = count($children);

  if ($children_count > 0) {
    $vars['page']['main_prefix']['classes_array'] = 'child-elements-' . $children_count;
  }
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function drupalcamppa_aurora_preprocess_region(&$vars, $hook) {

}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function drupalcamppa_aurora_preprocess_block(&$vars, $hook) {
  $vars['title_attributes_array']['class'][] = 'block__title';
}
// */

/**
 * Override or insert variables into the entity template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("entity" in this case.)
 */
function drupalcamppa_aurora_preprocess_entity(&$vars, $hook) {
  // Field Collections
  if ($vars['elements']['#entity_type'] == 'field_collection_item') {

    // HAB Links
    if ($vars['elements']['#bundle'] == 'field_hab_links') {
      // Add the class selection to the link.
      foreach ($vars['field_hab_link_class'] as $key => $class) {
        $vars['content']['field_hab_link'][$key]['#element']['attributes']['class'] = 'button ' . check_plain($class['value']);
      }
    }
  }

  // BEAN
  if ($vars['elements']['#entity_type'] == 'bean') {
    if ($vars['elements']['#bundle'] == 'site_name_banner') {
      $vars['sitename'] = variable_get('site_name', "Drupal Camp PA");
    }
  }

  // View Modes
  if (isset($vars['view_mode'])) {
    $vars['theme_hook_suggestions'][] = 'viewmode__' . $vars['view_mode'];
  }
}
// */

/**
 * Override or insert variables into the node template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function drupalcamppa_aurora_preprocess_node(&$vars, $hook) {
  $node = $vars['node'];

  // Add a 'has image' modifier if there is an image displayed
  if ($vars['field_announcement_image']) {
    $vars['classes_array'][] = 'm--has-image';
  }
}
// */

/**
 * Override or insert variables into the field template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("field" in this case.)
 */
/* -- Delete this line if you want to use this function
function drupalcamppa_aurora_preprocess_field(&$vars, $hook) {

}
// */

/**
 * Override or insert variables into the comment template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function drupalcamppa_aurora_preprocess_comment(&$vars, $hook) {
  $comment = $vars['comment'];
}
// */

/**
 * Override or insert variables into the views template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function drupalcamppa_aurora_preprocess_views_view(&$vars) {
  $view = $vars['view'];
}
// */


/**
 * Override or insert css on the site.
 *
 * @param $css
 *   An array of all CSS items being requested on the page.
 */
/* -- Delete this line if you want to use this function
function drupalcamppa_aurora_css_alter(&$css) {

}
// */

/**
 * Override or insert javascript on the site.
 *
 * @param $js
 *   An array of all JavaScript being presented on the page.
 */
/* -- Delete this line if you want to use this function
function drupalcamppa_aurora_js_alter(&$js) {

}
// */
