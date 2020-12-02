<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
		// 
		$router = service('router');
		$controller  = strtolower(str_replace("\\App\\Controllers\\", "", $router->controllerName()));
		$method = $router->methodName();

	    if (session('logged_in') == false && $controller != "auth") {
	    	header("Location: " . base_url("auth/index"));
	    	exit;
	    }

	    // print_r(session()->get());
	    $permissions = is_array( session("permissions") ) ? session("permissions") : array();

	    if ( !in_array("{$controller}/{$method}", $permissions) && !session('is_admin') && $controller != "auth") {
	    	throw new \Exception("No action is authorized, the path {$controller}/{$method} is not allowed for your role", 403);
	    }
	}

}
