'use strict'

/** @type {typeof import('@adonisjs/lucid/src/Lucid/Model')} */
const Model = use('Model')

class BookLoan extends Model {
	static get table() {
		return 'book_loans';
	}

	static get primaryKey() {
		return 'id'
	}
}

module.exports = BookLoan
