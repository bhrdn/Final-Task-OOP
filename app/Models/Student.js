'use strict'

/** @type {typeof import('@adonisjs/lucid/src/Lucid/Model')} */
const Model = use('Model')

class Student extends Model {
	static get table() {
		return 'student'
	}

	static get primaryKey() {
		return 'nim'
	}
}

module.exports = Student
