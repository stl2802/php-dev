document.addEventListener("DOMContentLoaded", () => {
    const textPrint = document.getElementById("text__print");
    const buttons = document.querySelectorAll(".calc-button");

    const operators = ["+", "-", "*", "/"];
    const brackets = ["(", ")"];

    buttons.forEach(button => {
        button.addEventListener("click", () => {
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
        });
    });
});