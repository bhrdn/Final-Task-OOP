'use strict'

/** @type {import('@adonisjs/lucid/src/Schema')} */
const Schema = use('Schema')

class BooksSchema extends Schema {
  up () {
    this.create('books', (table) => {
      table.increments()
      table.string('title').notNullable()
      table.string('author').nullable()
      table.string('description').nullable()
      table.string('category_id').nullable()
      table.timestamps()
    })
  }

  down () {
    this.drop('books')
  }
}

module.exports = BooksSchema
