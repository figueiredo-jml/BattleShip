const express = require('express')
const http = require('http')
const WebSocket = require('ws')

const port = 6969;
const server = http.createServer(express)
const wss = new WebSocket.Server({ server })

const players = []
const grids = []
let turn = 0

let p1Count = 0
let p2Count = 0

wss.on('connection', function connection(ws) {
  if(players.length === 2){
    ws.close()
    return
  }
  if(p1Count === 17 || p2Count === 17){
    return
  }
  players.push(ws)
  console.log(`Client connected.`)
  ws.send(players.length)
  
  //First turn of the game
  if(players.length === 2){
    //players[0].send('00')
    players[0].send(JSON.stringify("t"))
  }
  ws.onmessage = message => {
    data = JSON.parse(message.data)
    console.log(data)

    if(grids.length < 2){
      grids.push(data)
    }else{
      if(ws === players[0] && turn === 0){
        //1st number = player / 2nd number = hit/miss
        turn = 1
        //player1
        if(grids[1].includes(data)){
          players[0].send(JSON.stringify('01 ' + data))
          players[1].send(JSON.stringify('11 ' + data))
          p1Count++
          //player1 hit
        }else{
          players[0].send(JSON.stringify('00 ' + data))
          players[1].send(JSON.stringify('10 ' + data))
          //player1 miss
        }
      }else if(ws === players[1] && turn === 1){
        turn = 0
        //player2
        if(grids[0].includes(data)){
          players[0].send(JSON.stringify('11 ' + data))
          players[1].send(JSON.stringify('01 ' + data))
          p2Count++
          //player2 hit
        }else{
          players[0].send(JSON.stringify('10 ' + data))
          players[1].send(JSON.stringify('00 ' + data))
          //player2 miss
        }
      }
      //disconnect players
      if(ws === players[0] && data === 111){
        console.log("Player 1 Disconnected")
        players[0].close
        players.splice(0,1)
        grids.splice(0,1)
      }
      if(ws === players[1] && data === 111){
        console.log("Player 1 Disconnected")
        players[0].close
        players.splice(0,1)
        grids.splice(0,1)
      }else{
        if(p1Count === 17 || p2Count === 17){
          if(p1Count === 17){
            players[0].send(JSON.stringify('p1'))
            players[1].send(JSON.stringify('p2'))
          }else if(p2Count === 17){
            players[0].send(JSON.stringify('p2'))
            players[1].send(JSON.stringify('p1'))
          }
              
        }
      }

      if(players.length === 2){
        players[turn].send(JSON.stringify('t'))
      }
      
    }
  }
})

server.listen(port, function() {
  console.log(`Server is listening on ${port}!`)
})
