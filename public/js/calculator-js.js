(function (){

    //click a button and get it in an input field
    var firstOperand;
    var operator;
    var secondOperand;
    var output;
    var inputState = true; 

    //global variable to track the state of our input.
    //if value is false go into left hand side.  when we hit an operator, we change the value to true.
    //then send all inputs to the right side.  
        
    var numbers = document.getElementsByClassName('num-btn')
    for (var i=0; i < numbers.length; i++) { 
        numbers[i].addEventListener('click', function() {
            if (inputState == true) {
                // firstOperand = 
                document.getElementById('left_operand').value += this.getAttribute("data-number");
            } else {
                // secondOperand = 
                document.getElementById('right_operand').value += this.getAttribute("data-number");
            }
        });
    }

    //get operator in the operator input
    var operators = document.getElementsByClassName('operator')
    for (var i=0; i < operators.length; i++){
        operators[i].addEventListener('click', function() {
            operator = this.getAttribute("data-operator");
            console.log(operator);
            document.getElementById('operator').value = operator;
            inputState = false; 
        })
    }


    var equals = document.getElementById('equals');
    equals.addEventListener("click", function(){ 
        firstOperand = document.getElementById('left_operand').value;
        secondOperand = document.getElementById('right_operand').value;
        switch (operator){
            case "+":
                output = firstOperand + secondOperand;
                break;
            case "-":
                output = firstOperand - secondOperand;
                break;
            case "*":
                output = firstOperand * secondOperand;
                break;
            case "/":
                output = firstOperand / secondOperand;
                break;
        }
        document.getElementById('operator').value = '';
        document.getElementById('right_operand').value = '';
        document.getElementById('left_operand').value = output;

    });

    var clear = document.getElementById('clear');
    clear.addEventListener('click', function(){
        inputState = true;
        document.getElementById('operator').value = '';
        document.getElementById('right_operand').value = '';
        document.getElementById('left_operand').value = '';
    })


})();