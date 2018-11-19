'use strict'

const Book = use('App/Models/Book')

class BookController {
	
	async index({ response }) {
		return response.json(await Book.all())
	}

	async store({ request, response }) {
		const attr = request.only([
			'title',
			'author',
			'description',
			'category_id'
		]), b = new Book()

		b.title 	  = attr.title
		b.author 	  = attr.author
		b.description = attr.description
		b.category_id = attr.category_id
		
		await b.save()

		return response.status(201).json(b)
	}

	async update({ params, request, response }) {
		const attr = request.only([
			'title',
			'author',
			'description',
			'category_id'
		]), b = await Book.find(params.isbn)

		if (!b) return response.status(404).json({data: 'Resource not found'})

		b.title 	  = attr.title
		b.author 	  = attr.author
		b.description = attr.description
		b.category_id = attr.category_id

		await b.save()

		return response.status(200).json(b)
	}

	async delete({params, response}) {
		const b = await Book.find(params.isbn)

		if (!b) return response.status(404).json({data: 'Resource not found'})

		await b.delete()

		return response.status(204).json(null) 
	}
}

module.exports = BookController
