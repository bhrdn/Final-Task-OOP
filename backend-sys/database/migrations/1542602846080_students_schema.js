'use strict'

/** @type {import('@adonisjs/lucid/src/Schema')} */
const Schema = use('Schema')

class StudentsSchema extends Schema {
  up () {
    this.create('students', (table) => {
      table.increments()
      table.string('first_name').notNullable()
      table.string('last_name').nullable()
      table.string('prodi').notNullable()
      table.string('year').notNullable()
      table.timestamps()
    })
  }

  down () {
    this.drop('students')
  }
}

module.exports = StudentsSchema
