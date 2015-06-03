<?php
/**
 * @file
 * ding_nodelist.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function ding_nodelist_user_default_permissions() {
  $permissions = array();

  // Exported permission: 'configure nodelist'.
  $permissions['configure nodelist'] = array(
    'name' => 'configure nodelist',
    'roles' => array(
      'administrators' => 'administrators',
      'local administrator' => 'local administrator',
    ),
    'module' => 'ding_nodelist',
  );

  return $permissions;
}
