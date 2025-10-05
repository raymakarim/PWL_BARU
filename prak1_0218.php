<!DOCTYPE html>
<html lang="en">
<head>
<title>Ini Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
        * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html, body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
        color: #333;
        line-height: 1.6;
    }

    header {
        background: #4a90e2;
        padding: 25px;
        text-align: center;
        font-size: 28px;
        color: white;
        font-weight: bold;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    section {
        display: flex;
        margin: 20px;
        gap: 20px;
        flex: 1; /* ensures content expands to fill space */
    }

    nav {
        flex: 1;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        text-align: center;
    }

    nav img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    }

    article {
        flex: 3;
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    article h2 {
        color: #4a90e2;
        margin-bottom: 10px;
    }

    article p {
        font-size: 20px;
        color: #444;
    }

    footer {
        background: #4a90e2;
        color: white;
        text-align: center;
        padding: 15px;
        border-radius: 8px 8px 0 0;
        margin-top: auto; /* pushes footer to bottom */
    }

    @media (max-width: 768px) {
        section {
            flex-direction: column;
        }
    }

</style>
</head>
<body>

<header>
  <?php echo "Hola, Welcome to my About me !" ?>
</header>

<section>
  <nav>
    <img src="pfp.jpg" alt="Profile Picture">
  </nav>
  
  <article>
    <?php 
      echo "<h2>I'm Ray.</h2>";
      echo "<p>An undergraduate student currently studying System Information in AMIKOM Yogyakarta. Born and raised in medan i came to jogja to persue my education. 
      I do gaming, reading, music and binge watching anything i want in my free time. </p>";
    ?>
  </article>
</section>

<footer>
  <?php echo "This is the footer." ?>
</footer>

</body>
</html>
