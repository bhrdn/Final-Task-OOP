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
	Route.get('books/:isbn', 'BookController.show')
	Route.get('books', 'BookController.index')
	Route.post('books', 'BookController.store')
	Route.put('books/:isbn', 'BookController.update')
	Route.delete('books/:isbn', 'BookController.delete')

	Route.get('loan/:id', 'BookLoanController.show')
	Route.get('loan', 'BookLoanController.index')
	Route.post('loan', 'BookLoanController.store')
	Route.put('loan/:id', 'BookLoanController.update')

	Route.get('student/:id', 'StudentController.show')
	Route.get('student', 'StudentController.index')
	Route.post('student', 'StudentController.store')
	Route.put('student/:id', 'StudentController.update')
}).prefix('api')