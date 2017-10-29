<?php

namespace Drupal\graphql_jwt_auth\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('graphql.request')) {
      $authOption = $route->getOption('_auth');
      if (empty($authOption)) {
        $authOption = [];
      }
      $authOption['_auth'] = 'jwt_auth';
      $route->setOption('_auth', $authOption);
    }
  }
}
