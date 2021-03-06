<?php

namespace Schmiddim\Amazon\Doctrine;

use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerPluginProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use Zend\Console\Adapter\Posix;

class Module implements
	AutoloaderProviderInterface,
	BootstrapListenerInterface,
	ConfigProviderInterface,
	ControllerPluginProviderInterface,
	ViewHelperProviderInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function onBootstrap(EventInterface $event)
	{
		/* @var $app \Zend\Mvc\ApplicationInterface */
		$app = $event->getTarget();
	}

	/**
	 * {@inheritDoc}
	 */
	public function getViewHelperConfig()
	{
		return array(
			'factories' => array(),
		);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getControllerPluginConfig()
	{
		return array(
			'factories' => array(),
		);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/../../src/' . __NAMESPACE__,
				),
			),
		);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getConfig()
	{
		return include __DIR__ . '/../../../../config/module.config.php';
	}

	public function getConsoleUsage(Posix $console)
	{
		$routeItems = array();
		$routeItems[] = 'List of all defined routes';
		foreach ($this->getConfig()['console']['router']['routes'] as $route) {
			$r = $route['options']['route'];
			$action = $route['options']['defaults']['controller'] . ' ' . $route['options']['defaults']['action'] . 'Action';
			$routeItems[] = [$r, $action];

		}
		return $routeItems;
	}
}