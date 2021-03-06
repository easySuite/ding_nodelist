<?php

/**
 * @file
 * ding_nodelist.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function ding_nodelist_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_image_default_styles().
 */
function ding_nodelist_image_default_styles() {
  $styles = array();

  // Exported image style: ding_nodelist_extra_medium.
  $styles['ding_nodelist_extra_medium'] = array(
    'name' => 'ding_nodelist_extra_medium',
    'label' => 'ding_nodelist_extra_medium',
    'effects' => array(
      27 => array(
        'label' => 'Scale',
        'help' => 'Scaling will maintain the aspect-ratio of the original image. If only a single dimension is specified, the other dimension will be calculated.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => 760,
          'height' => '',
          'upscale' => 1,
        ),
        'weight' => 1,
      ),
      29 => array(
        'label' => 'Crop',
        'help' => 'Cropping will remove portions of an image to make it the specified dimensions.',
        'effect callback' => 'image_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_crop_form',
        'summary theme' => 'image_crop_summary',
        'module' => 'image',
        'name' => 'image_crop',
        'data' => array(
          'width' => 760,
          'height' => 562,
          'anchor' => 'center-center',
        ),
        'weight' => 4,
      ),
    ),
  );

  // Exported image style: ding_nodelist_large.
  $styles['ding_nodelist_large'] = array(
    'name' => 'ding_nodelist_large',
    'label' => 'ding_nodelist_large',
    'effects' => array(
      21 => array(
        'label' => 'Manual Crop: Reuse cropped style',
        'help' => 'Reuse a crop selection from another Manual Crop enabled image style.',
        'effect callback' => 'manualcrop_reuse_effect',
        'form callback' => 'manualcrop_reuse_form',
        'summary theme' => 'manualcrop_reuse_summary',
        'module' => 'manualcrop',
        'name' => 'manualcrop_reuse',
        'data' => array(
          'reuse_crop_style' => 'crop_22_9',
          'apply_all_effects' => 0,
        ),
        'weight' => 0,
      ),
      19 => array(
        'label' => 'Scale',
        'help' => 'Scaling will maintain the aspect-ratio of the original image. If only a single dimension is specified, the other dimension will be calculated.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => 1160,
          'height' => '',
          'upscale' => 1,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: ding_nodelist_medium.
  $styles['ding_nodelist_medium'] = array(
    'name' => 'ding_nodelist_medium',
    'label' => 'ding_nodelist_medium',
    'effects' => array(
      17 => array(
        'label' => 'Manual Crop: Reuse cropped style',
        'help' => 'Reuse a crop selection from another Manual Crop enabled image style.',
        'effect callback' => 'manualcrop_reuse_effect',
        'form callback' => 'manualcrop_reuse_form',
        'summary theme' => 'manualcrop_reuse_summary',
        'module' => 'manualcrop',
        'name' => 'manualcrop_reuse',
        'data' => array(
          'reuse_crop_style' => 'crop_16_9',
          'apply_all_effects' => 0,
        ),
        'weight' => 0,
      ),
      18 => array(
        'label' => 'Scale',
        'help' => 'Scaling will maintain the aspect-ratio of the original image. If only a single dimension is specified, the other dimension will be calculated.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => 600,
          'height' => 600,
          'upscale' => 1,
        ),
        'weight' => 3,
      ),
    ),
  );

  return $styles;
}
