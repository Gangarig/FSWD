

function submitData() {
    var number_one = document.forms["sum"]["number_one"].value;
    var number_two = document.forms["sum"]["number_two"].value;
    var sum = Number(number_one) + Number(number_two);

    var result = document.getElementById('result');

    result.innerHTML = '<h2>The sum of the numbers is ' + sum + ' </h2>';
  }