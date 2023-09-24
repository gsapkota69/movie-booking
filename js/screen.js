const container = document.querySelector('.container');
const seats = document.querySelectorAll('.row .seat:not(.occupied)');
const count = document.getElementById('count');
const total = document.getElementById('total');
const selectedMovie = document.getElementById('movie');
const button = document.getElementById('pay');

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
    seat.classList.toggle('selected'); // toggle must come before assigning toggled element to a list we can work with!
    updateCount();
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
}

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