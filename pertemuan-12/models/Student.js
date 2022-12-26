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
            db.query(sql, data, (err, results) => {
                resolve(results);
            });
        });
    }
}

// export model
module.exports = Student;
