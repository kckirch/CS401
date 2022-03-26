



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
            <div class="login">
                <div id="loginTitle">Login</div>
            
            
                <form method="post">
                    <div class="txt_field">
                        <label>Username</label>
                        <input type="text" required>
                        
                    </div>

                    <div class="txt_field">
                        <label>Password</label>
                        <input type="password" required>
                        
                    </div>

                    

                    <input type="submit" value="Login">

                    <div class="signup_link">
                        Not a member? <a href="#">Signup</a>
                    </div>
                </form>
            </div>

        </article>



    </main>

    <footer class="flex-footer">
        <?php include "footer.php"?>
    </footer>

</body>



    
        

    


</html>
