<?php

require_once 'C:\\xampp\\htdocs\\symfony-1.4.4\\symfony-1.4.4\\lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
  }
}
