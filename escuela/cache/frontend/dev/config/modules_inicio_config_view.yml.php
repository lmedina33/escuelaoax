<?php
// auto-generated by sfViewConfigHandler
// date: 2013/09/10 11:38:14
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('menu.css', '', array ());
  $response->addStylesheet('tema_torres_bodet/jquery-ui-1.10.3.custom.min.css', '', array ());
  $response->addJavascript('jquery-1.4.4.min.js', '', array ());
  $response->addJavascript('jquery-ui-1.10.1.custom.min.js', '', array ());


