<?php session_start(); ?>
<?php
if (isset($_POST['reset'])) {
    session_unset();
    $_SESSION['currentBalance'] = 100;
}
?>
<?php
 if(isset($_POST['continue_play'])){
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
    <style>
        .d-none{
            display: none;
        }
        .padding-15{
            padding: 15px;
        }
    </style>
</head>
<body>
<?php $balance = 100; 
    if(isset($_SESSION['currentBalance']) && !empty($_SESSION['currentBalance'])){
        $balance = $_SESSION['currentBalance'];
    }
?>
<h2>Welcome to Lucky 7 Game</h2>
<div class="padding-15">
    Your current balance is Rs. <span id="balance"><?php echo $balance; ?></span>
</div>

<div class="padding-15">
    <span id="bet">Place your bet</span>
</div>
<form action="getresult.php" method="post">
    <input type="hidden" name="balance" value="<?php echo $balance; ?>">
<div class="padding-15" id="select_bet">
    <label for="below_7">[Below 7]</label>
    <input type="radio" id="below_7" value="below_7" name="bet_for" required><br>
    <label for="7">[7]</label>
    <input type="radio" id="7" value="7" name="bet_for" required><br>
    <label for="above_7">[Above 7]</label>
    <input type="radio" id="above_7" value="above_7" name="bet_for" required><br>
</div>
<button type="submit" id="play">Play</button>
</form>

<h4>Game Result</h4>
<div class="" id="game_result">
    Dice 1: <span id="dice1"><?php echo isset($_SESSION['dice1']) ? $_SESSION['dice1']: ''?></span><br>
    Dice 2: <span id="dice2"><?php echo isset($_SESSION['dice2']) ? $_SESSION['dice2']: ''?></span><br>
    Total : <span id="total"><?php echo isset($_SESSION['total']) ? $_SESSION['total']: ''?></span>
</div>
<?php
if(isset($_SESSION['status']) && $_SESSION['status'] == 'win'){
    echo "<h4>Congratulations! You Win! your balance us now $balance Rs.</h4>";
}elseif(isset($_SESSION['status']) && $_SESSION['status'] == 'lose'){
    echo "<h4>You Lose! your balance us now $balance Rs.</h4>";
}
?><br>
<form action="" method="post">
    <input type="submit" name="reset" value="Reset and play again">
</form>
<form action="" method="post">
    <input type="hidden" name="balance" value="<?php echo $balance; ?>">
    <input type="submit" name="continue_play" value="Continue Play">
</form>
</body>

<script>
    // $(document).on('click', '#bet', function(){
    //     $('#select_bet').removeClass('d-none');
    // });
    // $(document).on('click', '#play', function(){
        
    // });
</script>
</html>