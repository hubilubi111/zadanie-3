</head>
<body>

    <h2>Formularz logowania</h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "baza";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $enteredLogin = $_POST['login'];
        $enteredPassword = $_POST['haslo'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $enteredLogin);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($enteredPassword == $row['password']) {
                echo "Zalogowano pomyślnie";
            } else {
                echo "Błędne hasło";
            }
        } else {
            echo "Nieprawidłowy login";
        }

        $stmt->close();
    }

    $conn->close();
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Login:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Zaloguj</button>
    </form>

</body>
</html>
