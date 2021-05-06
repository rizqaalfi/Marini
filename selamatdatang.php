<!DOCTYPE HTML>
<html>

<head>
    <title>Halaman Home</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            outline: 0;
            font-family: 'Open Sans', sans-serif;
        }

        body {
            height: 100vh;
            min-height: 200px;
            background-image: url(backg1.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 150px 240px;
            width: 300px;
            min-height: 200px;

            background-color: white;
            box-shadow: 0 0 10px rgba(255, 255, 255, .3);
        }

        .container h1 {
            text-align: center;
            color: black;
            margin-bottom: 30px;
            text-transform: uppercase;
            border-bottom: 4px solid black;
        }

        .container form button {
            width: 100%;
            padding: 5px 0;
            border: none;
            background-color: yellow;
            font-size: 18px;

        }
    </style>
</head>

<body>
    <div class="container">
        <h1>WELCOME TO MARINI</h1>
        <form>
            <button>Masak Apa Hari Ini?</button>
        </form>
    </div>
</body>

</html>