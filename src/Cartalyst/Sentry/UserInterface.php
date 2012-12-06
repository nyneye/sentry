<?php namespace Cartalyst\Sentry;
/**
 * Part of the Sentry Package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Sentry
 * @version    2.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011 - 2013, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use RuntimeException;

class UserExistsException extends RuntimeException {}
class UserNotActivatedException extends RuntimeException {}
class LoginFieldRequiredException extends RuntimeException {}
class UserNotFoundException extends RuntimeException {}

interface UserInterface
{
	/**
	 * Get user login column
	 *
	 * @return  string
	 */
	public function getLoginColumn();

	/**
	 * Get user login column
	 *
	 * @param   integer  $id
	 * @return  Cartalyst\Sentry\UserInterface
	 */
	public function findById($id);

	/**
	 * Get user by login value
	 *
	 * @param   string  $login
	 * @return  Cartalyst\Sentry\UserInterface
	 */
	public function findByLogin($login);

	/**
	 * Get user by credentials
	 *
	 * @param   array  $credentials
	 * @return  Cartalyst\Sentry\UserInterface
	 */
	public function findByCredentials(array $attributes);

	/**
	 * Activate a user
	 *
	 * @param   string  $login
	 * @param   string  $activationCode
	 * @return  bool
	 */
	public function activate($activationCode);

	/**
	 * Check if user is activated
	 *
	 * @param   UserInterface  $user
	 * @return  bool
	 */
	public function isActivated();

	/**
	 * Reset a user's password
	 *
	 * @return  string|false
	 */
	public function resetPassword();

	/**
	 * Confirm a password reset request
	 *
	 * @param   string  $password
	 * @param   string  $resetCode
	 * @return  bool
	 */
	public function resetPasswordConfirm($password, $resetCode);

	/**
	 * Clears Password Reset Fields
	 *
	 * @param   UserInterface  $user
	 * @return  $user
	 */
	public function clearResetPassword();

	/**
	 * See if a user has a required permission
	 *
	 * @param   string  $permission
	 * @return  bool
	 */
	public function hasAccess($permission);

}