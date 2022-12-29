// inport student controller
const StudentController = require("../controllers/StudentController");

// import express
const express = require ("express");

// buat object router
const router = express.Router();

// Buat routing home
router.get("/", (req, res) => {
    res.send("Hello Satria Ramadhan");
});

// Buat routing student
router.get("/students", StudentController.index);
router.post("/students", StudentController.store);
router.put("/students/:id", StudentController.update);
router.delete("/students/:id", StudentController.destroy);
router.get("/students/:id", StudentController.show);

// ecport routing
module.exports = router;