'use strict'

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Http routes are entry points to your web application. You can create
| routes for different URL's and bind Controller actions to them.
|
| A complete guide on routing is available here.
| http://adonisjs.com/docs/4.0/routing
|
*/

/** @type {typeof import('@adonisjs/framework/src/Route/Manager')} */
const Route = use('Route')

Route.get('/', () => {
  return "Hello :)"
})

Route.group(() => {
	Route.post('books', 'BookController.store')
	Route.get('books', 'BookController.index')
	Route.put('books/:isbn', 'BookController.update')
	Route.delete('books/:isbn', 'BookController.delete')
}).prefix('api')