<?php

namespace JiraConnect;

use JiraConnect\Controller\AdminConnectPage;
use JiraConnect\Controller\AdminLogsPage;
use JiraConnect\Controller\AdminOptionsPage;
use JiraConnect\Controller\AsyncAttachment;
use JiraConnect\Controller\AsyncSubmit;
use JiraConnect\Controller\AdminFieldsPage;
use JiraConnect\Controller\CronController;
use JiraConnect\Controller\AcceptanceContainer;
use JiraConnect\Controller\LocationDetector;
use JiraConnect\Controller\SelectFieldType;
use JiraConnect\Controller\AsyncQueue;
use JiraConnect\Controller\DescriptionChanger;
use JiraConnect\Controller\TagGenerator;
use JiraConnect\Controller\TagGeneratorAjax;
use JiraConnect\Controller\AdminUserData;
use JiraConnect\Core\PluginCore;

/**
 * Class Plugin
 * @package JiraConnect\Core
 * @author Piotr Karecki <pkarecki@gmail.com>
 */
class Plugin extends PluginCore {
	public static function getControllers() {
		return [
			TagGenerator::class,
			TagGeneratorAjax::class,
			SelectFieldType::class,
            DescriptionChanger::class,
			CronController::class,
            LocationDetector::class,
            AcceptanceContainer::class,

			AdminUserData::class,
			AdminFieldsPage::class,
			AdminLogsPage::class,
			AdminConnectPage::class,
			AdminOptionsPage::class,

			AsyncQueue::class,
			AsyncSubmit::class,
			AsyncAttachment::class,
		];
	}

	public static function getDebugControllers() {
		return [];
	}

	/**
	 * Run at plugin startup
	 */
	public function run() {
		//tmp fix
		//add_filter('wpcf7_spam', '__return_false');
		//add_filter('wpcf7_skip_mail', '__return_true');
	}

	/**
	 * The code that runs during plugin activation.
	 */
	public function activate() {
		// implement if needed
	}

	/**
	 * The code that runs during plugin deactivation.
	 */
	public function deactivate() {
		// implement if needed
	}
}