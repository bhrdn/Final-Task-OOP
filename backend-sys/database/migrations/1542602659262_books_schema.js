'use strict'

/** @type {import('@adonisjs/lucid/src/Schema')} */
const Schema = use('Schema')

class BooksSchema extends Schema {
  up () {
    this.create('books', (table) => {
      table.increments()
      table.string('title').notNullable()
      table.string('author').notNullable()
      table.string('description').nullable()
      table.string('category').notNullable()
      table.string('total').nullable()
      table.timestamps()
    })
  }

  down () {
    this.drop('books')
  }
}

module.exports = BooksSchema
