# Drupal 8 module

This folder contains the module Drupal needs to know about the REST API and run it.

The folder rest_api_demo is supposed to be installed under this one:

{Drupal root folder}/sites/all/modules 

This is how the REST API should be called:

https://backend.emanuelesantanche.com/rest_api_demo/demo_resource/${type_of_articles}?_format=json

${type_of_articles} can be any content type, even though the query will return useful information only for the
content types ems_article and wrt_item.

