// import db
const db = require("../config/database");

// buat model student
class Student {
    static all() {
        return new Promise((resolve, reject) => {
          // lakukan query untuk ambil data
          const sql = "SELECT * FROM students";
          db.query(sql, (err, results) => {
              resolve(results);
          });
      });
    }

     // Create Student
     static async create(data) {
        // promise 1
        const id = await new Promise((resolve, reject) => {
            const query = "INSERT INTO students SET ?";
            db.query(query, data, (err, results) => {
                resolve(results.insertId);
            });
        });

        // promise 2
        return new Promise((resolve, reject) =>{
            const query = "SELECT * FROM students WHERE id = ?";
            db.query(query, id, (err, results) => {
                resolve(results);
            });
        });
    }

    // Find student
    static find(id){
        // Promise select id
        return new Promise((resolve, reject)=>{
            const query = "SELECT * FROM students WHERE id = ?";
            db.query(query, id, (err, results)=>{
                resolve(results[0]);
            });
        });
    }

     // Update Student
    static update(id, data) {
        new Promise((resolve, reject) => {
        const query = `UPDATE students SET ? WHERE id = ?`;
            db.query(query, [data, id], (err, results) => {
                resolve(results);
            });
        });
        
        const student = this.find(id);
        return student;
    }

    

    // delete student
    static destroy(id){
        new Promise((resolve, reject) => {
            const query = `DELETE FROM students WHERE id = '${id}'`;
            db.query (query, (err, results) => {
                resolve(results)
            });
        });

        const student = this.find(id);
        return student;
    }
}

// export model
module.exports = Student;
