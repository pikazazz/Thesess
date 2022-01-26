const express = require('express');
const app = express();
const server = require('http').createServer(app);
const axios = require('axios');

const io = require('socket.io')(server, {
    cors: { origin: "*" }
});




io.on('connection', (socket) => {
    console.log('connection');

    socket.on('sendChatToServer', ({
        chanel,
        sender_id,
        sender,
        message,
        sender_img }) => {


        axios({
            method: 'POST',
            url: 'http://127.0.0.1:8000/api/messageapi',
            data: {
                'chanel': chanel,
                'sender_id': sender_id,
                'sender': sender,
                'message': message
            }
        })
            .then(response => {
                // io.sockets.emit('sendChatToClient', message);
                socket.broadcast.emit('sendChatToClient', ({
                    chanel,
                    sender_id,
                    sender,
                    message,
                    sender_img
                }));

            })
            .catch(err => {
                // io.sockets.emit('sendChatToClient', message);


            })
    });

    socket.on('disconnect', (socket) => {
        console.log('Disconnect');
    });
});

server.listen(3000, () => {
    console.log('Server is running');
});
