'use strict'

const Student = use('App/Models/Student')

class StudentController {

	async index({
        response
    }) {
        return response.json(await Student.all())
    }

    async store({
        request,
        response
    }) {
        const attr = request.only(['nim', 'name', 'prodi', 'year'])
        const st = new Student()
        
        st.nim		= attr.nim
        st.name		= attr.name
        st.prodi	= attr.prodi
        st.year 	= attr.year
        
        await st.save()
        return response.status(201).json(st)
    }
    
    async update({
        params,
        request,
        response
    }) {
        const attr = request.only(['nim', 'name', 'prodi', 'year'])
        const st = await Student.find(params.id)
    
        if (!st) return response.status(404).json({
            data: 'Resource not found'
        })

        st.nim 		= attr.nim
        st.name		= attr.name
        st.prodi	= attr.prodi
        st.year 	= attr.year

        await st.save()
        return response.status(200).json(st)
    }

    async show({
        params,
        response
    }) {
        return response.json(await Student.find(params.id))
    }
}

module.exports = StudentController
