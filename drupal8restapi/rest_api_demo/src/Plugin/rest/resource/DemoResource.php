<?php

namespace Drupal\rest_api_demo\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * Provides a Demo Resource
 *
 * @RestResource(
 *   id = "demo_resource",
 *   label = @Translation("Demo Resource"),
 *   uri_paths = {
 *     "canonical" = "/rest_api_demo/demo_resource/{type}"
 *   }
 * )
 */
class DemoResource extends ResourceBase {

  /**
   * Responds to entity GET requests.
   * @return \Drupal\rest\ResourceResponse
   */
  public function get($type = NULL) {
    
    if ($type) {
    
      // Getting node ids for node of type $type
      $nids = \Drupal::entityQuery('node')->condition('type', $type)->execute();
      
      if ($nids) {
          
        // Getting the actual nodes
        $nodes =  \Drupal\node\Entity\Node::loadMultiple($nids);
        
        foreach ($nodes as $key => $value) {
          // Getting the image field as object of class ImageItem
          $img_item = $value->get('field_image')[0];
      
          $url = "undefined";
          
          if ($img_item) {
            // Getting the FileItem object
            $img_file = $img_item->get('entity')->getTarget();
            
            // Getting the actual url where the image can be found
            if ($img_file) {
                $url = file_create_url($img_file->get('uri')->getString());
            }            
          }
          
          // Putting together the response for the current node
          $data[] = ['id' => $value->id(), 'title' => $value->getTitle(), 'image' => $url];
        }
      }
    }
    
    $response = new ResourceResponse($data);
    // In order to generate fresh result every time (without clearing 
    // the cache), you need to invalidate the cache.
    $response->addCacheableDependency($data);
    return $response;
  }
}
