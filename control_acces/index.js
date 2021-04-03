// Import dependencies
const SerialPort = require("serialport");
const Readline = require("@serialport/parser-readline");

// Defining the serial port
const port = new SerialPort("COM12", {
    baudRate: 9600,
});


// The Serial port parser
const parser = new Readline();
port.pipe(parser);

parser.on("data", function(line){
    // console.log(line)
    var matricule = line;
    fetch('https://localhost:8000/membre/verifier', {
        method: 'post',
        headers: {
          'Accept': 'application/json, text/plain, */*',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({matricule: matricule})
      }).then(res => res.json())
        .then(res => console.log(res))
        .catch(err =>function (err) {
          console.log(err);
        })
        ;
      

});

