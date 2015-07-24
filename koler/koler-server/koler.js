var express = require('express');
var app = express();
var _ = require('lodash');
var sock = require('socket.io');

var server = app.listen(4000, function(){

  var host = server.address().address
  var port = server.address().port

  console.log('Example app listening at http://%s:%s', host, port)

});

var io = sock.listen(server);


var users = [];

io.on('connection', function(socket){

	socket.on('login', function(data){
		users.push({'id': data.id, 'socket': socket.id});
		
	});

	socket.on('sendMessage', function(message){

		var peer_id = Number(message.peer_id);

		var contact = _.find(users, { 'id': peer_id });
		if(!contact){
			return; 
		}

		io.to(contact.socket).emit('messageReceived', message);
	});

	socket.on('disconnect', function(){
	
		_.remove(users, function(user){
			return user.socket == socket.id;
		});
	});

});