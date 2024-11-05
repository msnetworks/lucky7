<?php session_start(); ?>
<?php
if (isset($_POST['reset'])) {
    session_unset();
    $_SESSION['currentBalance'] = 100;
}
if (isset($_POST['continue_play'])) {
    session_unset();
    $_SESSION['currentBalance'] = $_POST['balance'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky 7</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .game-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .result-box {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .balance-box {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .btn-custom {
            width: 100%;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>
<body>

<?php $balance = 100;
if (isset($_SESSION['currentBalance']) && !empty($_SESSION['currentBalance'])) {
    $balance = $_SESSION['currentBalance'];
}
?>

<div class="container game-container text-center">
    <h2 class="mb-4">Welcome to Lucky 7 Game 🎲</h2>
    
    <div class="balance-box mb-4">
        Your current balance is Rs. <span id="balance"><?php echo $balance; ?></span>
    </div>
    
    <div class="mb-3">
        <span id="bet" class="h5">Place your bet:</span>
    </div>

    <form action="getresult.php" method="post">
        <input type="hidden" name="balance" value="<?php echo $balance; ?>">

        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
            <label class="btn btn-outline-primary">
                <input type="radio" id="below_7" value="below_7" name="bet_for" required> Below 7
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" id="7" value="7" name="bet_for" required> 7
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" id="above_7" value="above_7" name="bet_for" required> Above 7
            </label>
        </div>
        
        <button type="submit" class="btn btn-primary btn-custom">Play</button>
    </form>

    <h4 class="mt-4">Game Result</h4>
    <div id="game_result" class="result-box">
        <p>Dice 1: <span id="dice1"><?php echo isset($_SESSION['dice1']) ? $_SESSION['dice1'] : ''; ?></span></p>
        <p>Dice 2: <span id="dice2"><?php echo isset($_SESSION['dice2']) ? $_SESSION['dice2'] : ''; ?></span></p>
        <p>Total: <span id="total"><?php echo isset($_SESSION['total']) ? $_SESSION['total'] : ''; ?></span></p>
    </div>

    <?php
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] == 'win') {
            echo "<div class='alert alert-success mt-4'>Congratulations! You Win! Your balance is now Rs. {$_SESSION['currentBalance']}.</div>";
        } elseif ($_SESSION['status'] == 'lose') {
            echo "<div class='alert alert-danger mt-4'>You Lose! Your balance is now Rs. {$_SESSION['currentBalance']}.</div>";
        }
    }
    ?>

    <form action="" method="post" class="mt-4">
        <button type="submit" name="reset" class="btn btn-secondary btn-custom">Reset and Play Again</button>
    </form>
    <form action="" method="post" class="mt-2">
        <input type="hidden" name="balance" value="<?php echo $balance; ?>">
        <button type="submit" name="continue_play" class="btn btn-success btn-custom">Continue Play</button>
    </form>

    <!-- Footer -->
    <div class="footer text-center mt-4">
        Designed and developed by Mantu Sharma
    </div>
</div>

<!-- Bootstrap and jQuery JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
