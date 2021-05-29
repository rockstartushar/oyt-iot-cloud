var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/', function(req, res) {
   res.sendfile('index.html');
});

// users = [];
var user={};
io.on('connection', function(socket) {
   console.log('A user connected');
   socket.on('setUsername', function(data) {
      console.log(data, socket.id);
      
      if(user[data]) {
         socket.emit('userExists', data + ' username is taken! Try some other username.');
      } else {
         // users.push(data);
         user[data] =  socket.id;
         socket.emit('userSet', {username: data});
      }
   });
   
   socket.on('msg', function(data) {
      //Send message to everyone
      // io.sockets.emit('newmsg', data);
      console.log(user[data.user]);
      io.to(user["Tushar"]).emit('newmsg', data);
   })
});

http.listen(3000, function() {
   console.log('listening on localhost:3000');
});