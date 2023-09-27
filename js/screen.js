const container = document.querySelector('.container');
const seats = document.querySelectorAll('.row .seat:not(.occupied)');
const count = document.getElementById('count');
const total = document.getElementById('total');
const selectedMovie = document.getElementById('movie');
const button = document.getElementById('pay');
let occupiedSeats = [];

let ticketPrice = +selectedMovie.value; // '+' changes the value number from string form to an int, similar to parseInt(). 

let selectedSeats = document.querySelectorAll('.row .seat.selected');
// Functions:

function updateCount() {
  selectedSeats = document.querySelectorAll('.row .seat.selected');
  count.innerText = selectedSeats.length;
  total.innerText = ticketPrice * +count.innerText;
}


function clearSeats() {
  selectedSeats.forEach(seat => {
    seat.classList.remove('selected');
    count.innerText = 0;
    total.innerText = 0;
  })
}


// Event listeners:

// Seat selection, 'click' event:

seats.forEach(seat => {
  seat.addEventListener('click', e => {
    //select only if the seat is not occupied
    if(!seat.classList.contains('occupied')){
      seat.classList.toggle('selected');
      updateCount();
    }
  })
})

// Pick a movie, select list 'change' event:

selectedMovie.addEventListener('change', e => {
  clearSeats();
  ticketPrice = +selectedMovie.value; // upon select list change event to new movie, setting ticketPrice to value attribute of updated movie option tag.
})

//To update number of selected seats
function occupySeat(){
  selectedSeats.forEach(seat => {
    seat.classList.add('occupied');
    count.innerText = 0;
    total.innerText = 0;
  })
  //append all selected seats to sessions storage
  occupiedSeats = JSON.parse(sessionStorage.getItem('occupiedSeats'));
  if(occupiedSeats === null){
    occupiedSeats = [];
  }
  selectedSeats.forEach(seat => {
    occupiedSeats.push(seat.id);
  }
  )
  sessionStorage.setItem('occupiedSeats', JSON.stringify(occupiedSeats));
  console.log(sessionStorage.getItem('occupiedSeats'));
}

function readFromSession(){
  const occupiedSeats = JSON.parse(sessionStorage.getItem('occupiedSeats'));
  console.log(occupiedSeats);
  if(occupiedSeats !== null && occupiedSeats.length > 0){
    seats.forEach(seat => {
      if(occupiedSeats.indexOf(seat.id) > -1){
        seat.classList.add('occupied');
      }
    })
  }
}

readFromSession();

//Set money for esewa
function esewa(){
  const totalMoney = +document.getElementById("total").innerText;
  console.log(total);
  document.getElementById('tAmt').value = totalMoney;
  console.log(document.getElementById('tAmt'));
  document.getElementById('txAmt').value = totalMoney*13/100;
  document.getElementById('amt').value = totalMoney*86/100;
  document.getElementById('psc').value = totalMoney*1/100;
  document.getElementById('pdc').value = 0;
}