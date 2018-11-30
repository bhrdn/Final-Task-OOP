'use strict'

/** @type {import('@adonisjs/lucid/src/Schema')} */
const Schema = use('Schema')

class BookLoanSchema extends Schema {
  up () {
    this.create('book_loans', (table) => {
      table.increments()
      table.string('reserved_id').notNullable()
      table.string('id_books').notNullable()
      table.string('nim').notNullable()
      table.string('title').notNullable()
      table.string('status').nullable()
      table.timestamps()
    })
  }

  down () {
    this.drop('book_loans')
  }
}

module.exports = BookLoanSchema
