var myForm = document.forms.addNewForm;

var radioA = myForm.elements.inRadioInput;
var radioB = myForm.elements.outRadioInput;


var select1 = document.querySelector('#box1');
var select2 = document.querySelector('#box2');

radioA.addEventListener('click',function(){
	select1.style.display = 'block';
	select2.style.display = 'none';
	document.getElementById('optionBid').checked = false;
});

radioB.addEventListener('click',function(){
	select2.style.display = 'block';
	select1.style.display = 'none';
	document.getElementById('optionAid').checked = false;
});

