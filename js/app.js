document.addEventListener('DOMContentLoaded', () => {
  const userGrid = document.querySelector('.grid-user')
  const computerGrid = document.querySelector('.grid-computer')
  const displayGrid = document.querySelector('.grid-display')
  const ships = document.querySelectorAll('.ship')
  const destroyer = document.querySelector('.destroyer-container')
  const submarine = document.querySelector('.submarine-container')
  const cruiser = document.querySelector('.cruiser-container')
  const battleship = document.querySelector('.battleship-container')
  const carrier = document.querySelector('.carrier-container')
  const startButton = document.querySelector('#start')
  const rotateButton = document.querySelector('#rotate')
  const randomButton = document.querySelector('#random')
  const resetButton = document.querySelector('#reset')
  const multiButton = document.querySelector('#multi')
  const turnDisplay = document.querySelector('#whose-go')
  const infoDisplay = document.querySelector('#info')
  const userSquares = []
  const computerSquares = []
  let isHorizontal = true
  let currentPlayer = true
  const width = 10
  let prepareBoard = false

  let isGameOver = false
  let ws
  let userShips = []
  let multi = false
  let connected = false
  let block
  
  function getID(){
    //Get user id,name
    
      fetch("../js/readTable.php", { method : "POST" })
      .then(res => res.text()).then((txt) => {
        console.log(txt)
        ws.send(JSON.stringify(txt))
      })
    
  }
  
  //Create Board
  function createBoard(grid, squares) {
    for (let i = 0; i < width*width; i++) {
      const square = document.createElement('div')
      square.dataset.id = i
      square.classList.add('points')
      grid.appendChild(square)
      squares.push(square)
    }
  }
  //player 1
  createBoard(userGrid, userSquares)
  //bot or player 2
  createBoard(computerGrid, computerSquares)

  //Ships
  const shipArray = [
    {
      name: 'destroyer',
      directions: [
        [0, 1],
        [0, width]
      ]
    },
    {
      name: 'submarine',
      directions: [
        [0, 1, 2],
        [0, width, width*2]
      ]
    },
    {
      name: 'cruiser',
      directions: [
        [0, 1, 2],
        [0, width, width*2]
      ]
    },
    {
      name: 'battleship',
      directions: [
        [0, 1, 2, 3],
        [0, width, width*2, width*3]
      ]
    },
    {
      name: 'carrier',
      directions: [
        [0, 1, 2, 3, 4],
        [0, width, width*2, width*3, width*4]
      ]
    },
  ]

  //Draw the ships in random locations
  function generate(ship,player) {
    let randomDirection = Math.floor(Math.random() * ship.directions.length)
    let current = ship.directions[randomDirection]
    if (randomDirection === 0) direction = 1
    if (randomDirection === 1) direction = 10
    let randomStart = Math.abs(Math.floor(Math.random() * player.length - (ship.directions[0].length * direction)))

    const isTaken = current.some(index => player[randomStart + index].classList.contains('taken'))
    const isAtRightEdge = current.some(index => (randomStart + index) % width === width - 1)
    const isAtLeftEdge = current.some(index => (randomStart + index) % width === 0)

    if (!isTaken && !isAtRightEdge && !isAtLeftEdge) current.forEach(index => player[randomStart + index].classList.add('taken', ship.name))

    else generate(ship,player)
  }

  //Set computer ships
  for(var i = 0 ; i<5 ; i++){
    generate(shipArray[i],computerSquares)
  }

  function generateUser() {
    resetBoard()
    removeDragShip()
    for(var i = 0 ; i<5 ; i++){
      generate(shipArray[i],userSquares)
    }
  }

  randomButton.addEventListener('click', generateUser)

  //Rotate the ships
  function rotate() {
    if (isHorizontal) {
      destroyer.classList.toggle('destroyer-container-vertical')
      submarine.classList.toggle('submarine-container-vertical')
      cruiser.classList.toggle('cruiser-container-vertical')
      battleship.classList.toggle('battleship-container-vertical')
      carrier.classList.toggle('carrier-container-vertical')
      isHorizontal = false
      console.log(isHorizontal)
      return
    }
    if (!isHorizontal) {
      destroyer.classList.toggle('destroyer-container-vertical')
      submarine.classList.toggle('submarine-container-vertical')
      cruiser.classList.toggle('cruiser-container-vertical')
      battleship.classList.toggle('battleship-container-vertical')
      carrier.classList.toggle('carrier-container-vertical')
      isHorizontal = true
      console.log(isHorizontal)
      return
    }
  }
  rotateButton.addEventListener('click', rotate)

  //Remove Draggable Ships
  function removeDragShip(){
    ships.forEach(ship => displayGrid.removeChild(ship))
  }

  //Create Draggable Ships
  function createDragShip(){
    ships.forEach(ship => displayGrid.appendChild(ship))
  }
  
  //move around user ship
  ships.forEach(ship => ship.addEventListener('dragstart', dragStart))
  userSquares.forEach(square => square.addEventListener('dragstart', dragStart))
  userSquares.forEach(square => square.addEventListener('dragover', dragOver))
  userSquares.forEach(square => square.addEventListener('dragenter', dragEnter))
  userSquares.forEach(square => square.addEventListener('dragleave', dragLeave))
  userSquares.forEach(square => square.addEventListener('drop', dragDrop))
  userSquares.forEach(square => square.addEventListener('dragend', dragEnd))

  let selectedShipNameWithIndex
  let draggedShip
  let draggedShipLength

  ships.forEach(ship => ship.addEventListener('mousedown', (e) => {
    selectedShipNameWithIndex = e.target.id
    console.log(selectedShipNameWithIndex)
  }))

  function dragStart() {
    draggedShip = this
    draggedShipLength = this.childNodes.length
    console.log(draggedShip)
  }

  function dragOver(e) {
    e.preventDefault()
  }

  function dragEnter(e) {
    e.preventDefault()
  }

  function dragLeave() {
    console.log('drag leave')
  }

  function dragDrop() {
    let shipNameWithLastId = draggedShip.lastChild.id
    let shipClass = shipNameWithLastId.slice(0, -2)
    console.log(shipClass)
    let lastShipIndex = parseInt(shipNameWithLastId.substr(-1))
    let shipLastId = lastShipIndex + parseInt(this.dataset.id)
    console.log(shipLastId)
    const notAllowedHorizontal = [0,10,20,30,40,50,60,70,80,90,1,11,21,31,41,51,61,71,81,91,2,22,32,42,52,62,72,82,92,3,13,23,33,43,53,63,73,83,93]
    const notAllowedVertical = [99,98,97,96,95,94,93,92,91,90,89,88,87,86,85,84,83,82,81,80,79,78,77,76,75,74,73,72,71,70,69,68,67,66,65,64,63,62,61,60]
    
    let newNotAllowedHorizontal = notAllowedHorizontal.splice(0, 10 * lastShipIndex)
    let newNotAllowedVertical = notAllowedVertical.splice(0, 10 * lastShipIndex)

    selectedShipIndex = parseInt(selectedShipNameWithIndex.substr(-1))

    shipLastId = shipLastId - selectedShipIndex
    console.log(shipLastId)

    if (isHorizontal && !newNotAllowedHorizontal.includes(shipLastId)) {
      for (let i=0; i < draggedShipLength; i++) {
        userSquares[parseInt(this.dataset.id) - selectedShipIndex + i].classList.add('taken', shipClass)
      }
    //As long as the index of the ship you are dragging is not in the newNotAllowedVertical array! This means that sometimes if you drag the ship by its
    //index-1 , index-2 and so on, the ship will rebound back to the displayGrid.
    } else if (!isHorizontal && !newNotAllowedVertical.includes(shipLastId)) {
      for (let i=0; i < draggedShipLength; i++) {
        userSquares[parseInt(this.dataset.id) - selectedShipIndex + width*i].classList.add('taken', shipClass)
      }
    } else return

    displayGrid.removeChild(draggedShip)
  }

  function dragEnd() {
    console.log('dragend')
  }
  

  //Singler player or multiplayer

  function multiPlayer() {
    isGameOver = false
    if(multi === false){
      multi = true
      for (let i = 0; i < width*width; i++) {
      
        if (userSquares[i].classList.contains('taken')){
          userShips.push(i)
        }
      }
      console.log(userShips)

      //Delete computer ships
      for (let i = 0; i < width*width; i++) {
      
        if (computerSquares[i].classList.contains('taken')){
          computerSquares[i].classList = 'points'  
        }
      }
    }else if(multi === true){
      multi = false
      userShips = []
      console.log('userShips reseted!')
      
      //Set computer ships
      for(var i = 0 ; i<5 ; i++){
        generate(shipArray[i],computerSquares)
      }
    }  
  }

  multiButton.addEventListener('click', multiPlayer)

  //Reset User ships
  function resetBoard() {
    for (let i = 0; i < width*width; i++) {
      if (userSquares[i].classList.contains('taken')){
        userSquares[i].classList = 'points'  
      }else if(userSquares[i].classList.contains('boom')){
        userSquares[i].classList = 'points'
      }else if(userSquares[i].classList.contains('miss')){
        userSquares[i].classList = 'points'
      }
    }
    createDragShip()
  }

  resetButton.addEventListener('click', resetBoard)

  //Deactivate buttons
  function btnOff(){
    resetButton.removeEventListener('click', resetBoard)
    startButton.removeEventListener('click', playGame)
    multiButton.removeEventListener('click', multiPlayer)
    randomButton.removeEventListener('click', generateUser)
    rotateButton.removeEventListener('click', rotate)
  }

  //Game Logic
  function playGame() {
    if (isGameOver){
      isGameOver = false
      console.log(isGameOver)
      return
    }
    btnOff()
    if (prepareBoard === false){
      prepareBoard = true
      playerMove(computerSquares)
    }
    infoDisplay.innerHTML = playerCount + "/17"
    if(multi === true){
      if(connected == false){
        //Open Connection
        ws = new WebSocket('ws://localhost:6969')
        ws.onopen = () => {
          console.log('Connection opened!')
            //Send player grid to server
            ws.send(JSON.stringify(userShips))
            getID()
        }
        connected = true
        turnDisplay.innerHTML = 'Enemy Go'
        playGame()
        
      }else{
        ws.onmessage = message => {
          data = JSON.parse(message.data)
          if(data === 't'){
            turnDisplay.innerHTML = 'Your Go'
          }
          let msg1 = data.split(" ")[0]
          let msg2 = data.split(" ")[1]

          if(msg1 === "p1"){
            console.log(msg1)
            infoDisplay.innerHTML = "You WIN"
            gameOver()
          }else if(msg1 === "p2"){
            console.log(msg1)
            infoDisplay.innerHTML = "You Lost"
            gameOver()
          }
          //1st number = player / 2nd number = hit/miss
          if(msg1 === "01"){
            console.log("-01-")
            computerSquares[msg2].classList.add('boom')
            playerCount++
          }else if(msg1 === "00"){
            console.log("-00-")
            computerSquares[msg2].classList.add('miss')
          }else if(msg1 === "11"){
            console.log("-11-")
            userSquares[msg2].classList.add('boom')
          }else if(msg1 === "10"){
            console.log("-10-")
            userSquares[msg2].classList.add('miss')
          }
          infoDisplay.innerHTML = playerCount + "/17"
        }
        //Close Connection
        ws.onclose = function() {
          console.log('Connection closed!')
          ws = null
        }
      }
    }else{
      if (currentPlayer === true) {
        turnDisplay.innerHTML = 'Your Go'
      }else if (currentPlayer === false) {
        turnDisplay.innerHTML = 'Computers Go'
        setTimeout(computerGo, 1000)
      }
    }   
  }
  

  startButton.addEventListener('click', playGame)

  function playerMove(squares){
    squares.forEach(square => square.addEventListener('click', function(e) {
      revealSquare(square)
    }))
  }

  //player and cpu ships
  let playerCount = 0
  let cpuCount = 0
 

  function revealSquare(square) {
    //Cant play in the same block
    if(square.classList.contains('boom') || square.classList.contains('miss')){
      return
    }
    
    //multiplayer rules
    if(multi === true){
      ws.send($(square).attr("data-id"))
      turnDisplay.innerHTML = 'Enemy Go'
    }else{
      //singleplayer rules
      if (square.classList.contains('taken')) {
        square.classList.add('boom')
        playerCount++
      } else {
        square.classList.add('miss')
      }
      checkForWins()
      currentPlayer = !currentPlayer
      playGame()
    }
    
  }

  function computerGo() {
    let random = Math.floor(Math.random() * userSquares.length)
    if (!userSquares[random].classList.contains('boom')) {
      userSquares[random].classList.add('boom')
      if(userSquares[random].classList.contains('taken')){
        cpuCount++
      }
      checkForWins()
    } else computerGo()
    currentPlayer = true
    console.log(currentPlayer);
    turnDisplay.innerHTML = 'Player1 Go'
  }

  function checkForWins() {
    //17 total ships
    if(cpuCount === 17){
      infoDisplay.innerHTML = "COMPUTER WINS"
      gameOver()
    }
    if(playerCount === 17){
      infoDisplay.innerHTML = "YOU WIN"
      gameOver()
    }
  }

  function resetComputer(){
    for (let i = 0; i < width*width; i++) {
      if (computerSquares[i].classList.contains('taken')){
        computerSquares[i].classList = 'points'  
      }else if(computerSquares[i].classList.contains('boom')){
        computerSquares[i].classList = 'points'
      }else if(computerSquares[i].classList.contains('miss')){
        computerSquares[i].classList = 'points'
      }
    }
    for(var i = 0 ; i<5 ; i++){
      generate(shipArray[i],computerSquares)
    }
  }

  function gameOver() {
    isGameOver = true
    computerSquares.forEach(square => square.removeEventListener('click', function(e) {
      revealSquare(square)
    }))
    cpuCount = 0
    playerCount = 0
    resetBoard()
    resetComputer()
    if(multi === true)
    {
      ws.close()
      multi = false
      connected = false
    }
    resetButton.addEventListener('click', resetBoard)
    startButton.addEventListener('click', playGame)
    multiButton.addEventListener('click', multiPlayer)
    randomButton.addEventListener('click', generateUser)
    rotateButton.addEventListener('click', rotate)   
  }

  $(window).bind("beforeunload", function() { 
    if(multi === true)
    {
      ws.send(JSON.stringify('closing'))
      ws.close()
      multi = false
      connected = false
    } 
  })
  
})
