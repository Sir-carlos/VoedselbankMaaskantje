var mysql = require('mysql');

var conn = mysql.createConnection({
    host: "localhost",
    user: "user",
    password: "password24!",
    database: "voedselbank"
});

conn.connect(function(err){
    if(err) throw err;
    console.log("connected!")
})

conn.query("SELECT * FROM klanten", function(err, result, fields){
    if(err){console.log(err)}
    console.log(result)
})