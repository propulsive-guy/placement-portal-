const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Create a MySQL connection
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'pyb231273',
    database: 'priyanshu'
});

// Connect to MySQL
connection.connect(err => {
    if (err) throw err;
    console.log('Connected to MySQL database');
});

// Middleware to parse JSON
 and URL-encoded form data
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Route to handle form submission
app.post('/submit-form', (req, res) => {
    const { name, email, branch, contact, registration_number, cgpa, tenth_percentage, twelfth_percentage, skillset, diploma } = req.body;

    // Insert data into MySQL database
    const sql = `INSERT INTO student_registration (name, email, branch, contact, registration_number, cgpa, tenth_percentage, twelfth_percentage, skillset, diploma) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;
    connection.query(sql, [name, email, branch, contact, registration_number, cgpa, tenth_percentage, twelfth_percentage, skillset, diploma], (err, result) => {
        if (err) {
            console.error('Error inserting data:', err);
            res.status(500).send('Error inserting data into database');
            return;
        }
        console.log('Data inserted successfully');
        res.send('Data inserted successfully');
    });
});

// Start the server
app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
