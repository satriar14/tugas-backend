// import model student
const Student = require("../models/Student")

const router = require("../routes/api");

class StudentController {
    async index(req, res){
        const students = await Student.all();

        const data = {
            message : "Menampilkan data student",
            data: students,
        };
        res.json(data);
        res.status(200).json(data);
    }

    async store(req, res){
        const {nama} = req.body;

        let student = {
            nama : nama,
        };
        
        const students = await Student.create(student);

        const data = {
            message: `menambahkan data student: ${nama}`,
            data: students,
        };

        res.json(data);
    };

    update(req, res){
        const {id} = req.params;
        const {nama} = req.body;

        const data = {
            message : `mengedit data students ${nama} dengan id ${id}`,
        };
        res.json(data);
    }

    destroy(req, res){
        const {id} = req.params;
        const {nama} = req.body
        
        const data = {
            message : `menghapus data students ${nama} dengan id ${id}`,
        };
        res.json(data);    
    }
}

// Buat object student controller
const object = new StudentController();

// export object
module.exports = object;