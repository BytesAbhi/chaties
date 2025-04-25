<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jai Hind Moment - World Record</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">


    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f0f0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 20px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
        }

        .header .title {
            font-size: 3em;
            font-weight: bold;
            color: #ff5722;
        }

        .subtitle {
            font-size: 1.2em;
            margin-top: 10px;
            color: #333;
        }

        .counter-section {
            margin-top: 30px;
        }

        .counter {
            background-color: #ff5722;
            color: white;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
        }

        .count-text {
            font-size: 1.5em;
        }

        .count {
            font-size: 2.5em;
            font-weight: bold;
        }

        .animation-section {
            margin-top: 40px;
            animation: bounce 1s infinite;
        }

        .flag-animation {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 75px;
            margin-top: 20px;
            animation: rotateFlag 5s infinite;
        }

        .flag {
            position: relative;
            width: 100%;
            height: 100%;
            background-color: #fff;
            border: 2px solid #000;
            border-radius: 10px;
            overflow: hidden;
        }

        .middle-stripe{
            height: 32px;
            
        }
        .top-stripe,
        .bottom-stripe {
            height: 20px;
            background-color: #ff5722;
            width: 100%;
        }

        .middle-stripe {
            background-color: #fff;
        }

        .bottom-stripe {
            background-color: #009688;
        }

        .wheel {
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #3f51b5;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        @keyframes rotateFlag {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        footer {
            margin-top: 40px;
            font-size: 1.1em;
            color: #333;
            font-weight: bold;
        }

        .footer-text {
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <h1 class="title">Jai Hind Moment</h1>
            <p class="subtitle">Breaking the World Record by Drawing 1 Crore Indian Flags!</p>
        </header>

        <section class="counter-section">
            <div class="counter">
                <p class="count-text">Flags Drawn:</p>
                <p id="flagCount" class="count">0</p>
            </div>
        </section>

        <section class="animation-section">
            <div class="flag-animation">
                <div class="flag">
                    <div class="top-stripe"></div>
                    <div class="middle-stripe"></div>
                    <div class="bottom-stripe"></div>
                    <div class="wheel"></div>
                </div>
            </div>
        </section>

        <footer>
            <p class="footer-text">Join us in the historic moment and be part of the largest flag drawing event ever!
            </p>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let flagCount = 0;
            const flagCountElement = document.getElementById('flagCount');

            // Simulate drawing flags every 1 second
            setInterval(function() {
                if (flagCount < 100000000) { // Limit it to 1 Crore (10 Million)
                    flagCount++;
                    flagCountElement.textContent = flagCount.toLocaleString();
                }
            }, 0.0000000000000000000000001); // Every 100ms increments the count by 1
        });
    </script>
</body>

</html>
