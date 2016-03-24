(function (){
    
    var decimal1 = true;
    var decimal2 = true; 
    var inputState = true; 

    //Clicking on numbers.      
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

    //Add a decimal to a number.  
    var decimal = document.getElementById('decimal');
    decimal.addEventListener('click', function(){ 
        if (inputState == true && decimal1 == true) {
            document.getElementById('left_operand').value += this.getAttribute("data-number");
            decimal1 = false;
        } else if (inputState == false && decimal2 == true) {
            document.getElementById('right_operand').value += this.getAttribute("data-number");
            decimal2 = false;
        }
        
    });

    //Change the sign of a number.
    var sign = document.getElementById('sign');
    sign.addEventListener('click', function(){
        var negativeNum; 
        if (inputState == true && parseFloat(document.getElementById('left_operand').value) >= 0) {
            negativeNum = parseFloat(document.getElementById('left_operand').value) * -1;
            document.getElementById('left_operand').value = negativeNum;
        } else if (inputState == false) {
            negativeNum = parseFloat(document.getElementById('right_operand').value) * -1;
            document.getElementById('right_operand').value = negativeNum;
        }
        
    });

    //Get percentage of a number.
    var percentNum = document.getElementById('percentage');
    percentNum.addEventListener('click', function(){
        var percent; 
        if (inputState == true) {
            percent = parseFloat(document.getElementById('left_operand').value) * .001;
            document.getElementById('left_operand').value = percent;
        }
        
    });


    //get operator in the operator input
    var operators = document.getElementsByClassName('operator')
    for (var i=0; i < operators.length; i++){
        operators[i].addEventListener('click', function() {
            document.getElementById('operator').value = this.getAttribute("data-operator");
            inputState = false; 
        })
    }


    var equals = document.getElementById('equals');
    equals.addEventListener("click", function(){
        var firstOperand;
        var operator;
        var secondOperand;
        var output;
        firstOperand = document.getElementById('left_operand').value;
        secondOperand = document.getElementById('right_operand').value;
        operator = document.getElementById('operator').value;
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
        inputState == true; 
        document.getElementById('operator').value = '';
        document.getElementById('right_operand').value = '';
        document.getElementById('left_operand').value = output.toFixed(3);

    });

    //CLEAR button
    var clear = document.getElementById('clear');
    clear.addEventListener('click', function(){
        inputState = true;
        document.getElementById('operator').value = '';
        document.getElementById('right_operand').value = '';
        document.getElementById('left_operand').value = '';
    })


})();