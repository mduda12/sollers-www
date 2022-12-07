<?php

namespace JiraConnect\Core;

use DI\Container;
use DI\ContainerBuilder;
use Exception;
use JiraConnect\Plugin;

/**
 * Class Plugin
 * @package JiraConnect\Core
 * @author Piotr Karecki <pkarecki@gmail.com>
 */
abstract class PluginCore {
	/**
	 * @var Registerer
	 */
	private $registerer;

	/**
	 * @var ControllerLoader
	 */
	private $controllerLoader;

	/**
	 * @var Plugin|null
	 */
	private static $instance = null;

	/**
	 * @var bool
	 */
	private static $debugMode = false;

	/**
	 * @var string|null
	 */
	private static $pluginEntryFile = null;

	/**
	 * @var Container|null
	 */
	private static $container = null;

	/**
	 * @return mixed
	 * @author Piotr Karecki <pkarecki@gmail.com>
	 */
	abstract public static function getControllers();

	/**
	 * Run at plugin startup
	 */
	abstract public function run();

	/**
	 * The code that runs during plugin activation.
	 */
	abstract public function activate();

	/**
	 * The code that runs during plugin deactivation.
	 */
	abstract public function deactivate();

	/**
	 * PluginCore constructor.
	 *
	 * @param Registerer $registerer
	 * @param ControllerLoader $controllerLoader
	 */
	public function __construct(Registerer $registerer, ControllerLoader $controllerLoader) {
		$this->registerer = $registerer;
		$this->controllerLoader = $controllerLoader;
		$controllers = $this->getControllers();
		if(self::isDebugMode() && method_exists($this, 'getDebugControllers')) {
			$controllers = array_merge($controllers,$this->getDebugControllers());
		}
		$this->controllerLoader->setControllers($controllers);
	}

	/**
	 * @return mixed
	 */
	public static function getPluginEntryFile() {
		return self::$pluginEntryFile;
	}

	/**
	 * @param mixed $pluginEntryFile
	 */
	public static function setPluginEntryFile($pluginEntryFile) {
		self::$pluginEntryFile = $pluginEntryFile;
	}

	/**
	 * @return bool
	 */
	public static function isDebugMode(): bool {
		return self::$debugMode;
	}

	/**
	 * @param bool $debugMode
	 */
	public static function setDebugMode(bool $debugMode) {
		self::$debugMode = $debugMode;
	}

	/**
	 * @return void
	 * @throws Exception
	 */
	public static function runInstance() {
		if (is_null(self::$instance)) {
			try {
				self::$instance = self::getInstance();
			} catch (Exception $e) {
				if (Plugin::isDebugMode()) {
					throw $e;
				} else {
					return;
				}
			}
		}
		if (is_null(self::$instance)) {
			return;
		}
		try {
			self::$instance->run();
			self::$instance->controllerLoader->run();
			self::$instance->registerer->run();
			register_activation_hook(self::$pluginEntryFile, [self::$instance, 'activate']);
			register_deactivation_hook(self::$pluginEntryFile, [self::$instance, 'deactivate']);
		} catch (Exception $e) {
			if (Plugin::isDebugMode()) {
				throw $e;
			} else {
				return;
			}
		}
	}

	/**
	 * @return Container|null
	 * @throws Exception
	 */
	private static function getContainer() {
		if (is_null(self::$container)) {
			$containerBuilder = new ContainerBuilder();
			$containerBuilder->addDefinitions(dirname(self::getPluginEntryFile()) . '/config/definitions.php');
			if (!self::isDebugMode() && method_exists($containerBuilder, 'enableCompilation')) {
				$containerBuilder->enableCompilation(dirname(self::getPluginEntryFile()) . '/cache');
			}
			self::$container = $containerBuilder->build();
		}
		return self::$container;
	}

	/**
	 * @return Plugin|null
	 * @throws Exception
	 */
	private static function getInstance() {
		if (is_null(self::$instance)) {
			$container = self::getContainer();
			$plugin = $container->get(Plugin::class);
			self::$instance = $plugin;
		}
		return self::$instance;
	}
}