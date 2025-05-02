document.addEventListener("DOMContentLoaded", () => {
    let validationEnabled = true;
    const textPrint = document.getElementById("text__print");
    const buttons = document.querySelectorAll(".calc-button");
    const operators = ["+", "-", "*", "/"];

    function handleButtonClick(button) {
        if (!validationEnabled) {
            textPrint.value += button.value;
            return;
        }

        const lastChar = textPrint.value[textPrint.value.length - 1];
        
        if (operators.includes(lastChar) && operators.includes(button.value)) {
            textPrint.value = textPrint.value.slice(0, -1) + button.value;
            return;
        }

        if (button.value === "(") {
            if (lastChar && !operators.includes(lastChar) && lastChar !== "(") {
                return; 
            }
        } else if (button.value === ")") {
            if (!lastChar || operators.includes(lastChar) || lastChar === "(") {
                return; 
            }
        }

        if (!isNaN(button.value)) {
            if (lastChar === ")") {
                return;
            }
        }
        textPrint.value += button.value;
    }

    buttons.forEach(button => {
        button.addEventListener("click", () => handleButtonClick(button));
    });

/*     document.getElementById("otckl_val").addEventListener("click", () => {
        validationEnabled = false;
        alert("Валидация отключена");
    }); */

    const form = document.getElementById("calculatorForm");

    form.addEventListener("submit",(event) =>{
        event.preventDefault();
        GoToServer();
    }) 

    async function GoToServer() {
        const expression = textPrint.value;

        try {
            const response = await fetch('main.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `expression=${encodeURIComponent(expression)}`
            });
            
            const data = await response.json();
            
            if (!data.success) {
                throw new Error(`HTTP error! status: ${data.message}`);
            }
            textPrint.value = data.result;
        } catch (error) {
            console.error('Ошибка:', error);
            alert(`Ошибка: ${error.message}`);
        }
    }
});