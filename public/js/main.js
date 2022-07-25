
const target = document.getElementById("menu");
target.addEventListener('click', () => {
  target.classList.toggle('open');
  const navkey = document.getElementById("navkey");
  navkey.classList.toggle('in');
});

const input1 = document.getElementById('reserve_calender-date');
input1.addEventListener('input', handleInput);

function handleInput(event) {
  output1.textContent = event.target.value;
};

const input2 = document.getElementById('reserve_24h-time');
input2.addEventListener('input', handleInput2);

function handleInput2(event) {
  output2.textContent = event.target.value;
};

const input3 = document.getElementById('reserve_users-no');
input3.addEventListener('input', handleInput3);

function handleInput3(event) {
  output3.innerHTML = `${event.target.value}人`;
};

function clickEvent() {
  document.myform.submit();
};