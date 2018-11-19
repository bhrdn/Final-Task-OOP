'use strict'

/** @type {import('@adonisjs/lucid/src/Schema')} */
const Schema = use('Schema')

class BookLoanSchema extends Schema {
  up () {
    this.create('book_loans', (table) => {
      table.increments()
      table.string('nim').notNullable()
      table.string('first_name').notNullable()
      table.string('last_name').nullable()
      table.string('isbn').notNullable()
      table.string('title').notNullable()
      table.string('staff').notNullable()
      table.string('status').nullable()
      table.timestamps()
    })
  }

  down () {
    this.drop('book_loans')
  }
}

module.exports = BookLoanSchema
