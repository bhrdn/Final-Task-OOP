'use strict'

const Loan = use('App/Models/BookLoan')

class BookLoanController {
    
    async index({
        response
    }) {
        return response.json(await Loan.all())
    }

    async store({
        request,
        response
    }) {
        const attr = request.only(['reserved_id', 'id_books', 'nim', 'title', 'status'])
        const b    = new Loan()
        
        b.reserved_id 	= attr.reserved_id
        b.id_books      = attr.id_books
        b.nim 			= attr.nim
        b.title 		= attr.title
        b.status 		= attr.status
        
        await b.save()
        return response.status(201).json(b)
    }
    
    async update({
        params,
        request,
        response
    }) {
        const attr 	= request.only(['reserved_id', 'id_books', 'nim', 'title', 'status'])
        const b 	= await Loan.find(params.id)
    
        if (!b) return response.status(404).json({
            data: 'Resource not found'
        })

        b.reserved_id 	= attr.reserved_id
        b.id_books      = attr.id_books
        b.nim 			= attr.nim
        b.title 		= attr.title
        b.status 		= attr.status

        await b.save()
        return response.status(200).json(b)
    }

    async show({
        params,
        response
    }) {
        return response.json(await Loan.find(params.id))
    }
}

module.exports = BookLoanController