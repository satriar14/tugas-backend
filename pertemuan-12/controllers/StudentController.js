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
    };

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

    async update(req, res) {
        const { id } = req.params;
        const { nama } = req.body;
    
        // Update data students
        let student = {
          nama: nama,
        };
    
        const students = await Student.update(id, student);
    
        const data = {
          message: `Mengedit student id ${id}, nama ${nama}`,
          data: students,
        };
    
        res.json(data);
      };

    async destroy(req, res){
        const {id} = req.params;
        const {nama} = req.body;

        const students = await Student.destroy(id);
        
        const data = {
            message : `menghapus data students ${nama} dengan id ${id}`,
        };
        res.json(data); 
    };
}

// Buat object student controller
const object = new StudentController();

// export object
module.exports = object;