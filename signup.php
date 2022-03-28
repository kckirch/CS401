



<html lang="en"></html>
<head>
    <title>Rinventory</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="loginBodyID">

    <header class="flex-header-1">
        <?php include "header.php"?>
    </header>

    <header class="flex-header-2">
        <?php include "nav.php"?>
    </header>

    <main class="flex-main">



        <article class="main-content">
            <div class="signUp">
                <div id="signUp"><h1> Sign Up </h1></div>
            
            
                <form method="post" action="signup_handler.php/">
                    <div class="txt_field">
                        <label>Email</label>
                        <input type="text" id="email" name="email"required>
                        
                    </div>

                    <div class="txt_field">
                        <label>Password</label>
                        <input type="password" id="password" name="password" required>
                        
                    </div>

                    

                    <input type="submit" value="Create Account">

                    <div class="signup_link">
                        Have an account? <a href="login.php">Login</a>
                    </div>
                </form>
            </div>


        <?php
        echo $_POST['email'], $_POST['password'];
        ?>

        </article>



    </main>

    <footer class="flex-footer">
        <?php include "footer.php"?>
    </footer>

</body>



    
        

    


</html>
