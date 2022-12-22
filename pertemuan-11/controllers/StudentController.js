const router = require("../routes/api");

class StudentController {
    index(req, res){
        const data = {
            message : "Menampilkan data student",
        };
        res.json(data);
    }

    store(req, res){
        const {nama} = req.body;

        const data = {
            message : `menambahkan data students ${nama}`,
        };
        res.json(data);
    }

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