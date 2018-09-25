var http= require('http');
var mysql= require('mysql');

var conn =mysql.createConnection({
  host:"localhost",
  user:"root",
  password:""
});

conn.connect(function(err){
  if(err)throw err;
  console.log('Ühendatud');
})
var content='<h1>Hello</h1>';
http.createServer(function(req,res){
  res.writeHead(200,{
    'Content-Type':'text/html'
      
  })
  res.end(content);
}).listen(8080);
