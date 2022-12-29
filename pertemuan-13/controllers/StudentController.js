// import model student
const { find } = require("../models/Student");
const Student = require("../models/Student")

const router = require("../routes/api");

class StudentController {
    // Menampilkan data student
    async index(req, res){
        const students = await Student.all();

        const data = {
            message : "Menampilkan data student",
            data: students,
        };
        res.status(200).json(data);
    };

    // Menambahkan data student
    async store(req, res){
        const {nama} = req.body;
        const {nim} = req.body;
        const {email} = req.body;
        const {jurusan} = req.body;

        let student = {
            nama : nama,
            nim : nim,
            email : email,
            jurusan : jurusan
        };
        
        const students = await Student.create(student);

        const data = {
            message: `menambahkan data student: ${nama}`,
            data: students,
        };

        res.status(201).json(data);
    };

    // Update data student
    async update(req, res) {
        const { id } = req.params;
        const { nama } = req.body;

        // Mencari ID
        const students = await Student.find(id);
    
        // Update data
        if (students){
            const studentUpdated = await Student.update(id, req.body);
    
            const data = {
              message: `Mengedit student id ${id}, nama ${nama}`,
              data: studentUpdated,
            };
            res.status(200).json(data);
        }
        else{
            // kirim data tidak ada
            const data = {
                message: `Maaf data tidak ada`,
              };
              res.status(404).json(data);
        }
        
    };
    
    // Delete data student
    async destroy(req, res){
        const {id} = req.params;
        const {nama} = req.body;

        const students = await Student.find(id);

        if (students){
            await Student.destroy(id);
        
            const data = {
                message : `menghapus data students ${nama} dengan id ${id}`,
            };
            res.json(data); 
        }
        else{
            const data = {
                message:"Data tidak ada"
            };
            res.status(404).json(data);
        }

    };

    // get student by id
    async show (req, res){
        const { id } = req.params

        const student = await Student.find(id);

        if (student) {
            const data = {
                message: "Menampilkan data student",
                data: student,
            };
            res.status(200).json(data);
        }
        else{
            const data = {
                message: "Data tidak ada",
            };
            res.status(404).json(data);
        };
    }
}

// Buat object student controller
const object = new StudentController();

// export object
module.exports = object;