<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class='container my-1 rounded'>
		<form class='row' onSubmit='generat(event)'>
			<div class='col-12 col-xl-4'>
				<div class='form-group'>
					Nhập dãy số cần quay
					<input id='max-numbers' class='form-control' type='number' size='2' min='1' max='100'>
				</div>
			</div>
			<div class='col-12 col-xl-4'>
				<div class='form-group'>
					Chọn dãy số trúng thưởng
					<input id='numbers-to-pick'
					class='form-control'
					type='number'
					size='2'
					min='1'
					max='100'
					value='5'>
				</div>
			</div>

			<div class='col-12 col-xl-4'>
				Quay số &nbsp;
				<button type="" class='btn btn-primary form-control dial'>Quay số</button>
				<a href="index.php" class="backGame">Trở lại game</a>
			</div>
		</form>
		<div class='row mt-3 mt-xl-0' id='result-row'>
			<div class='col-12'>
				<h6 class='d-inline-block text-muted'>Your lucky numbers are</h6>
				<h3 id='results' class='d-inline-block ml-1'>ss</h3>
			</div>
		</div>
		<div class='row my-2'>

			<div class='numbers p-2 pl-4 d-flex flex-wrap'>
			</div>
		</div>
	</div>

</div>

<style type="text/css" media="screen">
	body {
		background: #479a70;
	}

	.container {
		background: rgba(255, 255, 255, .7);
		box-shadow: 0 0 5px black;
	}
	.dial{
		background: #ddd;
		padding: 5px;
		color: #333;
		text-decoration: none;
		border: 1px solid #333;
		border-radius: 5px;
		width: 100px;
	}
	.backGame{
		background: #ddd;
		padding: 5px;
		color: #333;
		text-decoration: none;
		border: 1px solid #333;
		border-radius: 5px;
	}
	.max-opacity {
		opacity: 1 !important;
		transition: opacity 2s;
	}

	#result-row {
		opacity: 0;
	}
	.numbers { 
		min-height: 100px;
	}

	.nr {
		font-family: sans-serif;
		text-align: center;
		margin: 10px;
		background: #ecd383;
		font-weight: bold;
		font-size: 24px;
		box-shadow: inset 5px -5px 15px rgba(0, 0, 0, .8), 
		inset -5px 5px 5px rgba(0, 0, 0, .2), 
		0 0 10px black;
		color: #333;
		width: 64px;
		height: 64px;
		line-height: 64px;
		border-radius: 50%;
		border: 2px solid black;
		transform: scale(1.0);
		opacity: 1;
		transition: transform 1s linear, opacity 1s linear;
		float: left;
	}
	.nr.init {
		transform: scale(3);
		opacity: 0;

	}
	input{
		margin-bottom: 20px;
	}
	.nr.active {
		transition: all 3s ease-out;
		background: #f77;
		transform: scale(1.35);

	}
	.rounded{
		padding: 20px;
	}
	.rounded::before{
		content: "";
		display: block;
	}
	.rounded::after{
		content: "";
		display: block;
		clear: both;
	}
</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
	let interval, isChangeMaxNum = false, isToNum = false;

	const qs = (v) => document.querySelector(v);
	var amountOfNumbers = parseInt(qs('#max-numbers').value, 10);
	var amountToSelect = parseInt(qs('#numbers-to-pick').value, 10);
	var numbersContainer = qs('.numbers');
	var allNumbers = [];

	$('#max-numbers').change(function () {
		isChangeMaxNum = true;
		amountOfNumbers = parseInt($(this).val());
	});
	$('#numbers-to-pick').change(function () {
		isToNum = true;
		amountToSelect = parseInt($(this).val());
	});

	

	function generat(e) {
		if (e) e.preventDefault();

		if (!isChangeMaxNum) {
			$('.numbers .nr').removeClass('active');
			activeNumber();
			return;
		}
		isChangeMaxNum = false;


		let created = 0;
		if (isNaN(amountOfNumbers)
			|| isNaN(amountToSelect) 
			|| amountOfNumbers <= 0 
			|| amountToSelect <= 0
			|| amountToSelect > amountOfNumbers) return;

			clearInterval(interval);

		while (numbersContainer.lastChild) {
			numbersContainer.removeChild(numbersContainer.lastChild);
		}
		qs('#result-row').classList.remove('max-opacity');
  // qs('#results').innerText = '';
  
  	interval = setInterval(() => {
	  	if (created < amountOfNumbers) {
	  		if (created > 0) {
	  			numbersContainer.lastChild.classList.remove('init');
	  		}
	  		const element = document.createElement('div');
	  		const number = created + 1;
	  		element.innerHTML = number;
	  		element.className = 'nr init';
	  		numbersContainer.appendChild(element);
	  		created += 1;
	  		allNumbers.push({ element, number });
	  	} else {
	  		clearInterval(interval);
	  		activeNumber();
	  	}
	}, 40);

}

function activeNumber() {
	numbersContainer.lastChild.classList.remove('init');
			
	  		const winningNumbers = [];
	  		const tmp = [...allNumbers];
	  		for (let i = 0; i < amountToSelect; i++) {
	  			const idx = Math.floor(Math.random() * tmp.length);
	  			tmp[idx].element.classList.add('active');
	  			winningNumbers.push(tmp.splice(idx, 1)[0]);

	  		}
	      // qs('#result-row').style.opacity = '1';
	      qs('#result-row').classList.add('max-opacity');
	      qs('#results').innerText = winningNumbers
	      .map(nr => nr.number)
	      .sort((a, b) => a - b)
	      .join(', ');
}
</script>

</body>
</html>