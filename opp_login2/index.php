<?php session_start();?>
<section class="index-login">
    <div class="wrapper">
        <div class="index-login-singup">
            <h4>sing up</h4>
            <p>Don't have account yet? sing up here!</p>
            <form action="includes/singupinc.php" method="post">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwdrepeat" placeholder="Repeat Password">
                <input type="text" name="email" placeholder="Email">
                <br>
                <button type="submit" name="submit">SING UP</button>
    </form>
    </div>
    <div class="index-login-singup">
            <h4>login</h4>
            <form action="includes/logininc.php" method="post">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <br>
                <button type="submit" name="submit">login</button>
    </form>
    </div>
</div>
</section>