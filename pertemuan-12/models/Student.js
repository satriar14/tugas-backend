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
    static create(data) {
        return new Promise((resolve, reject) => {
            const query = "INSERT INTO students SET ?";
            db.query(query, data, (err, results) => {
                resolve(results);
            });
        });
    }

     // Update Student
    static update(id, data) {
        return new Promise((resolve, reject) => {
        const query = `UPDATE students SET ?`;
            db.query(query, data, (err, results) => {
                resolve(results);
            });
        });
    }

    // delete student
    static destroy(id){
        return new Promise((resolve, reject) => {
            const query = `DELETE FROM students WHERE od = '${id}'`;
            db.query (query, (err, results) => {
                resolve(results)
            });
        });
    }
}

// export model
module.exports = Student;
