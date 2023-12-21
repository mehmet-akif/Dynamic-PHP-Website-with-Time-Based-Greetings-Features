<!DOCTYPE html>
<html>
<head>
    <title>Lab 08</title>
    <style>
       
      
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif; 
        }

        #background {
            width: 100%;
            height: 100vh;
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #background.morning {
            background-image: url('morning.jpeg');
            color: black; 
        }

        #background.afternoon {
            background-image: url('afternoon.jpeg');
            color: white; 
        }

        #background.evening {
            background-image: url('evening.jpeg');
            color: white; 
        }

        #background.night {
            background-image: url('night.jpeg');
            color: white; 
        }

     
        #greeting {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #ffffff;
            font-size: 4em;
            font-weight: bold;
           
            
        }

       
        .container {
            width: 60%;
            margin: 0 auto;
        }

        .form-container {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            margin-top: 50px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        
        a {
            color: #ffffff;
        }

        
        .hit-counter {
            position: fixed;
            bottom: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            opacity: 0.8;
        }

        
        .halloween-image {
            position: absolute;
            top: 20px;
            right: 20px;
            opacity: 0.8;
            max-width: 200px; 
        }
    </style>
</head>
<body>
    <?php
        function displayGreeting() {
            $hour = date('G');
            if ($hour >= 5 && $hour < 12) {
                return "Good morning";
            } elseif ($hour >= 12 && $hour < 18) {
                return "Good afternoon";
            } elseif ($hour >= 18 && $hour < 24) {
                return "Good evening";
            } else {
                return "Good night";
            }
        }
    ?>

    <div id="background" class="<?php echo strtolower(displayGreeting()); ?>">
        <h1 id="greeting"><?php echo displayGreeting(); ?></h1>
    </div>

        

    <div class="hit-counter">
        <?php
        $count = 0;
        if (isset($_COOKIE['visit_count'])) {
            $count = $_COOKIE['visit_count'];
        }
        $count++;
        setcookie('visit_count', $count, time() + (86400 * 30), '/');
        echo "Total visits: $count";
        ?>
    </div>

    <div class="container">
        <div class="form-container">
            <h2>Generate Multiplication Table</h2>
            <form action="lab08b.php" method="post">
                <label for="num1">Enter first number (between 3 and 12):</label>
                <input type="number" id="num1" name="num1" min="3" max="12" required>
                <label for="num2">Enter second number (between 3 and 12):</label>
                <input type="number" id="num2" name="num2" min="3" max="12" required>
                <input type="submit" value="Generate Table">
            </form>
        </div>
    </div>

    <div>
        <?php

        $imageToShow = '';
        $imageName = '';
       
        if (isset($_GET['image'])) {
            $image = $_GET['image'];
            
         
            switch ($image) {
                case 'zombie2.gif':
                case 'zombie':
                    $imageToShow = './images/zombie2.gif';
                    $imageName = './images/Halloween image is zombie1.gif';
                case 'witch1.gif':    
                case 'witch':
                    $imageToShow = './images/witch1.gif';
                    $imageName = 'Halloween image is witch1.gif'; 
                    break;
                case 'pumpkin3.gif':    
                case 'pumpkin':
                    $imageToShow = './images/pumpkin3.gif';
                    $imageName = 'Halloween image is pumpkin3.gif'; 
                    break;
                default:
                   
                    
                    break;
            }
            
        }
        ?>
    </div>
    
    <?php if ($imageToShow): ?>
    <div>
        <img src="<?php echo htmlspecialchars($imageToShow); ?>" alt="Halloween Image" class="halloween-image">
        <p><?php echo htmlspecialchars($imageName); ?></p>
    </div>

    <?php endif; ?>


</body>
</html>
