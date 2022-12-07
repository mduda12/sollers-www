<?php

namespace JiraConnect\Controller;

use JiraConnect\Atlassian\JiraHelper;
use JiraConnect\Core\ControllerCore;
use JiraConnect\Core\Registerer;
use JiraConnect\Plugin;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Monolog\Processor\MemoryUsageProcessor;

class CronController extends ControllerCore {
	private $jiraHelper;
	private $logger;

	/**
	 * CronController constructor.
	 *
	 * @param Registerer $registerer
	 * @param JiraHelper $jiraHelper
	 *
	 * @uses jira_connect_cron_event()
	 */
	public function __construct(Registerer $registerer, JiraHelper $jiraHelper) {
		$registerer->add_action('jira_connect_cron_event', $this);
		$this->jiraHelper = $jiraHelper;
		$this->logger = new Logger('cron');
		$dateFormat = 'Y-m-d H:i:s';
		$formatter = new LineFormatter("[%datetime%] %channel%.%level_name% : %message% (%extra.memory_usage%)\n", $dateFormat);
		$memoryProcessor = new MemoryUsageProcessor();
		$this->logger->pushProcessor($memoryProcessor);
		$fileLogHandler = new RotatingFileHandler(dirname(Plugin::getPluginEntryFile()) . '/log/debug.log', 0, Logger::DEBUG);
		$fileLogHandler->setFormatter($formatter);
		$this->logger->pushHandler($fileLogHandler);
	}

	public function jira_connect_cron_event() {
		sleep(1);
		ob_start();
		try {
			//$this->logger->debug('Start queue');
			$this->jiraHelper::processQueue();
			sleep(1);
			$this->logger->debug('Start submit');
			$submit = $this->jiraHelper->getSubmitToSend();
			if (!empty($submit) && $submit) {
				$this->logger->debug('1. Sending');
				$this->jiraHelper->sendSubmit($submit);
			} else {
				$this->logger->debug('1. Empty');
			}
			sleep(1);
			$this->logger->debug('Start file');
			$data = $this->jiraHelper->getFileToSend();
			if (is_array($data) && !empty($data['submit'])) {
				$this->logger->debug('2. Sending');
				$this->jiraHelper->sendFile($data['submit'], $data['file']);
			} else {
				$this->logger->debug('2. Empty');
			}
		} catch (\Exception $e) {
			var_dump($e);
		}
		$results = trim(ob_get_clean());
		if(!empty($results)) {
			$results = explode(PHP_EOL, $results);
			$this->logger->debug('Results:');
			foreach ($results as $line) {
				$this->logger->debug($line);
			}
		}
		$this->logger->debug('--------------------------------------------');
	}
}