<form id="divisionForm">
    <input type="number" id="sellingInput" placeholder="selling price">
    <input type="number" id="buyingInput" placeholder="Enter buying">
    <input type="number" id="resultInput" placeholder="Result" readonly>
</form>

<script>
    // Function to calculate and update the result
    function updateResult() {
        // Get selling and buying input values
        var selling = parseFloat(document.getElementById('sellingInput').value);
        var buying = parseFloat(document.getElementById('buyingInput').value);
        
        // Perform division
        var result = selling / buying;
        
        // Check if the buying is not zero and if the result is a valid number
        if (buying !== 0 && !isNaN(result)) {
            // Assign the result to the resultInput field
            document.getElementById('resultInput').value = result;
        } else {
            // Handle division by zero or invalid input
            document.getElementById('resultInput').value = "Error: Division by zero or invalid input";
        }
    }

    // Add event listeners to selling and buying inputs
    document.getElementById('sellingInput').addEventListener('input', updateResult);
    document.getElementById('buyingInput').addEventListener('input', updateResult);
</script>
