<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Three-Phase Current Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 300px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            font-size: 1.2em;
        }
        .checkbox-group {
            margin-bottom: 10px;
        }
        .checkbox-group input {
            width: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Three-Phase Current Calculator</h2>
    <label for="power">Power (P) in Watts:</label>
    <input type="number" id="power" placeholder="Enter power (P)">

    <label for="voltage">Voltage (kV) in kiloVolts:</label>
    <input type="number" id="voltage" placeholder="Enter voltage (V)">

    <label for="cosphi">Power Factor (cosφ):</label>
    <input type="number" id="cosphi" placeholder="Enter power factor (cosφ)" step="0.01" min="0" max="1">

    <div class="checkbox-group">
        <label><input type="checkbox" id="pf98" onclick="selectPF(0.98)"> 0.98</label>
        <label><input type="checkbox" id="pf96" onclick="selectPF(0.96)"> 0.96</label>
    </div>

    <button onclick="calculateCurrent()">Calculate Current (A)</button>

    <div class="result" id="result"></div>
</div>

<script>
    function selectPF(value) {
        document.getElementById('cosphi').value = value;
        document.getElementById('pf98').checked = (value === 0.98);
        document.getElementById('pf96').checked = (value === 0.96);
    }

    function calculateCurrent() {
        const P = parseFloat(document.getElementById('power').value);
        const V = parseFloat(document.getElementById('voltage').value);
        const cosphi = parseFloat(document.getElementById('cosphi').value);
        
        if (isNaN(P) || isNaN(V) || isNaN(cosphi) || P <= 0 || V <= 0 || cosphi <= 0 || cosphi > 1) {
            document.getElementById('result').innerText = "Please enter valid input values.";
            return;
        }

        const sqrt3 = Math.sqrt(3);
        const A = P / (V * cosphi * sqrt3);

        document.getElementById('result').innerText = `Current (A): ${A.toFixed(2)} A`;
    }
</script>

</body>
</html>