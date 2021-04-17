// Import dependencies
const SerialPort = require("serialport");
const Readline = require("@serialport/parser-readline");
const open = require('open');

// Defining the serial port
const port = new SerialPort("COM11", {
    baudRate: 9600,
});

const fetch = require("node-fetch");

// The Serial port parser
const parser = new Readline();
port.pipe(parser);

parser.on("data", function(line){
    console.log(line)
    open('http://127.0.0.1:8000/membre/edit/3');

    var matricule = line
    fetch('http://localhost:8000/api/membre/verifier', {
        method: 'post',
        headers: {
          'Accept': 'application/json, text/plain, */*',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({matricule:matricule})
      }).then(res => res.json())
        .then(res => {
        if(res.reponse){
          if(res.reponse == "1"){
            console.log("autorisé")
            /**
             * insérer dans présence 
             */
             fetch('http://localhost:8000/api/insert/presence', {
              method: 'post',
              headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({matricule:matricule})
            }).then(res =>res.json())
          }else{
            console.log("non autorisé")
          }
        }else{
          console.log("non autorisé")
        }

        })
        .catch(err=>function (err) {
          console.log("err.message")
        });
});

