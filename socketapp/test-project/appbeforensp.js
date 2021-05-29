var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/', function(req, res) {
   res.sendfile('index.html');
});
var clients = 0;
io.on('connection', function(socket) {
   console.log('A user connected');
   clients++;
//    io.sockets.emit('broadcast',{ description: clients + ' clients connected!'});
   //Send a message when 
//    setTimeout(function() {
//       //Sending an object when emmiting an event
//       socket.emit('testerEvent', { description: 'A custom event named testerEvent!'});
//    }, 4000);
//    socket.on('clientEvent', function(data){
//        console.log(data);
//    });
socket.emit('newclientconnect',{ description: 'Hey, welcome!'});
   socket.broadcast.emit('newclientconnect',{ description: clients + ' clients connected!'});   
   socket.on('disconnect', function () {
       clients--;
       socket.broadcast.emit('newclientconnect',{ description: clients + ' clients connected!'}); 
    //    io.sockets.emit('broadcast',{ description: clients + ' clients connected!'});
    // //   console.log('A user disconnected');
    });
});

http.listen(3000, function() {
   console.log('listening on localhost:3000');
});