<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));

    /**
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered via `Application::routes()` with `registerMiddleware()`
     */
    $routes->applyMiddleware('csrf');

    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    // $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    $routes->connect('/', ['controller' => 'Home', 'action' => 'index']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Pages
     */
    $routes->connect('/online-demo', ['controller' => 'Pages', 'action' => 'display', 'online_demo']);
    $routes->connect('/documentation', ['controller' => 'Pages', 'action' => 'display', 'documentation']);

    /**
     * Friendly URLs
     */
    $routes->connect('/roadmap', ['controller' => 'Roadmaps', 'action' => 'index']);
    $routes->connect('/contact-us', ['controller' => 'Contacts', 'action' => 'index']);

    /**
     * External redirects
     */
    $routes->redirect('/license', 'https://docs.google.com/document/d/1dPycAlAIoCgJg1r2Mxv4U4D2Pl6gG3D4NqWRyZ5sx4w/', ['status' => 302]);
    $routes->redirect('/tc', 'https://docs.google.com/document/d/1DzJWu9kH5gllFlFV9LLstuI4eGbhBwhXHhZ4KqGAI70/', ['status' => 302]);
    $routes->redirect('/payments', 'https://docs.google.com/document/d/1VkTCCD2hh3l9sgk-5VIrbuAbCEtl3BSXSG2uiJEgeP8/', ['status' => 302]);
    $routes->redirect('/tc_saas_enterprise', 'https://docs.google.com/document/d/1OwimW4_coRaFMQFmYU2Xy23uZ4qlwHdVMCg8Dpl7zws/', ['status' => 302]);
    $routes->redirect('/community_tc', 'https://docs.google.com/document/d/1GM4YHOio0jOnaoESyZRl3Jt6S2nSB9ztLIi9b4cWlvQ/', ['status' => 302]);
    $routes->redirect('/privacy', 'https://docs.google.com/document/d/1VctdYiI3b5_imQYYy0z3QEA8Ab6bpMISdhWBfj1pq2U/', ['status' => 302]);
    $routes->redirect('/blog', 'https://www.linkedin.com/company/eramba/', ['status' => 302]);
    $routes->redirect('/forum', 'https://discussions.eramba.org', ['status' => 302]);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *
     * ```
     * $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
     * $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
     * ```
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

/**
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * Router::scope('/api', function (RouteBuilder $routes) {
 *     // No $routes->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
