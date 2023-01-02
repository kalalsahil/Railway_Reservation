<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        .center{
            text-align: center;
        }

        #services{
            margin: 12px;
            display: block;
        }
        
        #services .box{
            border: 2px solid brown;
            padding: 34px;
            margin: 3px 6px;
            border-radius:28px;
            background: #f2f2f2;
            margin-bottom: 20px;
        
        }
        
        #services .box img{
            height: 160px;
            margin: auto;
            display: block;
        }
        
        #services .box p{
            font-family: 'Bree Serif', serif;
        }

        .h-primary {
            font-size: 3.2rem;
            padding: 12px;
            font-family: 'Bree Serif', serif;
        }
        
        .h-secondary{
            font-size: 1.8rem;
            padding: 12px;
            font-family: 'Bree Serif', serif;
        }
    </style>
</head>
<body>
    <section id="services-container">
        <h1 class="h-primary center">About Us</h1>
        <div id="services">
            <div class="box">
                <img src="img/2.png" alt="">
                <h2 class="h-secondary center">Free Cancellation</h2>
                <p class="center">Get free cancellation on training bookings!Make your train travel easier penalty-free nd worry-free</p>
            </div>
            <div class="box">
                <img src="img/1.jpeg" alt="">
                <h2 class="h-secondary center">Trip Guarantee</h2>
                <p class="center">WaitListed tickets no more. Get a confirmed ticket or a free upgrade to flights , cab & more</p>
            </div>
            <div class="box">
                <img src="img/3.jpeg" alt="">
                <h2 class="h-secondary center">Big Discounts</h2>
                <p class="center">& more , with Gpay , PhonePay for your next refreshing break</p>
            </div>
        </div>
    </section>
</body>
</html>