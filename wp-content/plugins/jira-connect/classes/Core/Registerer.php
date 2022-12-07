<?php

namespace JiraConnect\Core;

use JiraConnect\Options\Framework as OptionsFramework;
use JiraConnect\Plugin;
use WP_Error;

/**
 * Register all actions and filters for the plugin
 *
 * @since      1.0.0
 *
 * @package    pkarecki\PluginCore
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    pkarecki\PluginCore
 * @author     Piotr Karecki <pkarecki@gmail.com>
 */
/**
 * Register all custom types and taxonomies for the plugin.
 *
 * @since      1.0.0
 *
 * @package    pkarecki\PluginCore
 */

/**
 * Register all custom types and taxonomies for the plugin.
 *
 * @package    pkarecki\PluginCore
 * @author     Piotr Karecki <pkarecki@gmail.com>
 */
class Registerer {

    /**
     * The array of actions registered with WordPress.
     *
     * @since    1.0.0
     * @access   protected
     * @var      array $actions The actions registered with WordPress to fire when the plugin loads.
     */
    protected $actions;

    /**
     * The array of filters registered with WordPress.
     *
     * @since    1.0.0
     * @access   protected
     * @var      array $filters The filters registered with WordPress to fire when the plugin loads.
     */
    protected $filters;

    /**
     * The object of options framework
     *
     * @since    1.0.0
     * @access   protected
     * @var      OptionsFramework $optionsFramework The object of options framework.
     */
    protected $optionsFramework;

    /**
     * The array of objects to be registered with WordPress.
     * @since    1.0.0
     * @access   protected
     */
    protected $register;

    /**
     * The array of objects to be unregistered with WordPress.
     * @since    1.0.0
     * @access   protected
     */
    protected $unregister;

    /**
     * Initialize the collections
     *
     * @param OptionsFramework $optionsFramework
     */
    public function __construct(OptionsFramework $optionsFramework) {

        if (!is_null($optionsFramework)) {
            $this->setOptionsFramework($optionsFramework);
        }

        $this->actions = array();
        $this->filters = array();
        $this->register = array();
        $this->unregister = array();
    }

    /**
     * Add a new action to the collection to be registered with WordPress.
     *
     * @param string $hook The name of the WordPress action that is being registered.
     * @param object $component A reference to the instance of the object on which the action is defined.
     * @param string $callback The name of the function definition on the $component.
     * @param int $priority Optional. The priority at which the function should be fired. Default is 10.
     * @param int $accepted_args Optional. The number of arguments that should be passed to the $callback. Default is 1.
     *
     * @since    1.0.0
     */
    public function add_action($hook, $component, $callback = null, $priority = 10, $accepted_args = 1) {
        $this->add($this->actions, $hook, $component, $callback, $priority, $accepted_args);
    }

    /**
     * Add a new filter to the collection to be registered with WordPress.
     *
     * @param string $hook The name of the WordPress filter that is being registered.
     * @param object $component A reference to the instance of the object on which the filter is defined.
     * @param string $callback The name of the function definition on the $component.
     * @param int $priority Optional. The priority at which the function should be fired. Default is 10.
     * @param int $accepted_args Optional. The number of arguments that should be passed to the $callback. Default is 1
     *
     * @since    1.0.0
     */
    public function add_filter($hook, $component, $callback = null, $priority = 10, $accepted_args = 1) {
        $this->add($this->filters, $hook, $component, $callback, $priority, $accepted_args);
    }

    /**
     * A utility function that is used to register the actions and hooks into a single
     * collection.
     *
     * @param array $hooks The collection of hooks that is being registered (that is, actions or filters).
     * @param string $hook The name of the WordPress filter that is being registered.
     * @param object $component A reference to the instance of the object on which the filter is defined.
     * @param string $callback The name of the function definition on the $component.
     * @param int $priority The priority at which the function should be fired.
     * @param int $accepted_args The number of arguments that should be passed to the $callback.
     *
     * @return void
     * @since    1.0.0
     * @access   private
     */
    private function add(&$hooks, $hook, $component, $callback, $priority, $accepted_args) {
        $hooks[] = array(
            'hook' => $hook,
            'component' => $component,
            'callback' => !empty($callback) ? $callback : $hook,
            'priority' => $priority,
            'accepted_args' => $accepted_args
        );
    }

    /**
     * @param OptionsFramework $optionsFramework
     */
    public function setOptionsFramework(OptionsFramework $optionsFramework) {
        $this->optionsFramework = $optionsFramework;
    }

    public function register_post_type($post_type, $args = array()) {
        $this->register('post_type', $post_type, $args);
    }

    public function register_acf_group($args) {
        $this->register('acf_group', $args['title'], $args);
    }

    public function register($object_type, $type_name, $args) {
        $this->register[] = [
            'type' => $object_type,
            'name' => $type_name,
            'args' => $args
        ];
    }

    public function unregister($object_type, $type_names) {
        $this->unregister[] = [
            'type' => $object_type,
            'names' => $type_names,
        ];
    }

    /**
     * Register the filters and actions with WordPress.
     *
     * @since    1.0.0
     */
    public function run() {
        if (is_object($this->optionsFramework)) {
            $this->optionsFramework->run();
        }

        $compare = function ($a, $b) {
            return strcmp($a["hook"], $b["hook"]);
        };

        usort($this->actions, $compare);
        $this->processHooksArray($this->actions, 'action');

        usort($this->filters, $compare);
        $this->processHooksArray($this->filters, 'filter');
    }


    private function processHooksArray($array, $type) {
        $name = $id = null;
        foreach ($array as $hook) {
            if (is_object($this->optionsFramework) && Plugin::isDebugMode()) {
                $className = explode('\\', get_class($hook['component']));
                $class = array_pop($className);
                $id = implode('-', [$type, $hook['hook'], $class, $hook['callback']]);
                $args = array(
                    'id' => $id,
                    'desc' => $class . '->' . $hook['callback'] . '() p:' . $hook['priority'],
                    'type' => 'checkbox', //TODO: change to "multicheck"
                    'std' => 1
                );
                if ($name !== $hook['hook']) {
                    $name = $hook['hook'];
                    $args['name'] = ucfirst($type) . ': "' . $hook['hook'] . '"';
                }
                $this->optionsFramework->add_option($args);
            }
            if (!$id || (is_object($this->optionsFramework) && $this->optionsFramework->get($id, 1))) {
                add_filter(
                    $hook['hook'],
                    array(
                        $hook['component'],
                        $hook['callback']
                    ),
                    $hook['priority'],
                    $hook['accepted_args']
                );
            }
        }
    }


	/**
	 * unused????
	 *
	 * @author Piotr Karecki <pkarecki@gmail.com>
	 */
	public function init() {
		die('unused');
        if (is_object($this->optionsFramework)) { //TODO: rework options support - not working
            $this->optionsFramework->add_option(array(
                'id' => 'pkarecki-registerer',
                'name' => 'pkarecki Registerer',
                'desc' => 'pkarecki Object Registerer',
                'type' => 'heading'
            ));
        }

        //TODO: rework to common function
        $first = true;
        foreach ($this->unregister as $object) {
            $names = is_array($object['names']) ? $object['names'] : [$object['names']];
            foreach ($names as $name) {
                $id = null;
                if (is_object($this->optionsFramework)) {
                    $id = implode('-', [
                        'unregister',
                        $object['type'],
                        strtolower(str_ireplace(' ', '-', $name))
                    ]); //TODO: rework id
                    $args = array(
                        'id' => $id,
                        'desc' => ucfirst($object['type']) . ': "' . $name . '" (id:' . $id . ')',
                        'type' => 'checkbox', //TODO: change to "multicheck"
                        'std' => 1
                    );
                    if ($first) {
                        $first = false;
                        $args['name'] = 'Unregister:';
                    }
                    $this->optionsFramework->add_option($args);
                }
                if (!$id || (is_object($this->optionsFramework) && $this->optionsFramework->get($id, 1))) {
                    $this->run_unregister_objects($object['type'], $name);
                }
            }
        }
        $first = true;
        foreach ($this->register as $object) {
            $id = null;
            if (is_object($this->optionsFramework)) {
                $id = implode('-', [
                    'register',
                    $object['type'],
                    strtolower(str_ireplace(' ', '-', $object['name']))
                ]);
                $args = array(
                    'id' => $id,
                    'desc' => ucfirst($object['type']) . ': "' . $object['name'] . '" (id:' . $id . ')',
                    'type' => 'checkbox', //TODO: change to "multicheck"
                    'std' => 1
                );
                if ($first) {
                    $first = false;
                    $args['name'] = 'Register:';
                }
                $this->optionsFramework->add_option($args);
            }
            if (!$id || (is_object($this->optionsFramework) && $this->optionsFramework->get($id, 1))) {
                $this->run_register_objects($object['type'], $object['name'], $object['args']);
            }
        }
    }

    private function run_register_objects($type, $name, $args) {
        switch ($type) {
            case 'post_type':
            {
                register_post_type($name, $args);
                break;
            }
            case 'acf_group':
            {
                if (!function_exists('acf_add_local_field_group')) {
                    return new WP_Error('missing_acf_plugin', __('Missing ACF plugin'));
                }
                acf_add_local_field_group($args);
                break;
            }
            default:
            {
                return new WP_Error('invalid_type', __('Object type not defined'));
            }
        }
        return true;
    }

    private function run_unregister_objects($type, $names) {
        $function_names = [
            'post_type' => ['get_post_types', 'unregister_post_type'],
            'taxonomy' => ['get_taxonomies', 'unregister_taxonomy']
        ];
        if (empty($function_names[ $type ])) {
            return new WP_Error('invalid_type', __('Object type not defined'));
        }
        $names = is_array($names) ? $names : [$names];
        foreach ($names as $name) {
            $objects = $function_names[ $type ][0](['name' => $name], 'objects');
            if (
                isset($objects[ $name ]) &&
                is_object($objects[ $name ])
            ) {
                $function_names[ $type ][1]($name);
            }
        }
        return true;
    }

}
