// Import express
const express = require("express");

// Buat object express
const app = express();

// menggunakan middleware
app.use(express.json());

// definisikan route
const router = require("./routes/api");
app.use(router);



// Definisikan port
app.listen(3000, () => {
    console.log("server running at http://localhost:3000")
});