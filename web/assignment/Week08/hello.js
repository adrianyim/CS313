const http = require("http");
const fs = require("fs");
const readFile = require("./class.json");
let dt = require('./time.js');

http.createServer(
    (req, response)=>{
        let url = req.url;
        if (url === "/home") {
            // response.write(dt.myDateTime() + "<br>");
            response.write("<h1>Welcome to the Home Page</h1>");
            response.end();
        } else if (url === "/getData") {
            // let readFile = fs.readFileSync("class.json", (err, data)=>{
                response.writeHead(200, {"Content-Type": "application/json"});
                try {
                    // response.write(dt.myDateTime() + "<br>");
                    // data = JSON.parse(readFile);
                    response.write(readFile.name + ": " + readFile.class);
                    // for (let i in data) {
                    //     response.write(data.name[i] + ": " + data.class[i]);
                    // }
                    // response.write(data);
                    response.end();
                } catch(e) {
                    response.write("Error with reading json file!");
                    return;
                }
            // });
        } else {
            response.writeHead(404, {"Content-Type": "text/html"});
            response.write(dt.myDateTime() + "<br>");
            response.write("<h1>Page Not Found</h1>");
            response.end();
        }
    }
).listen(8888);