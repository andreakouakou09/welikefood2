<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Test</title>
    <style>
        .col1{
            
            border: 2px solid rgb(42, 214, 42);
            border-radius: 50px;
        }
        .col2{
            border: 5px solid orange;

        }

        .dislike{
            background-color: white;
            width: 255px;
            padding: 0 8px 0 8px;
            position:relative;
            top: -30px;
            left: 100px;
            
        }
        .divbleu{
            height: 50px;
            width: 50px;
            padding: 20px;
            background-color: blue; 
            border-radius: 35px;
            color: white;
        }
        .divred{
            height: 50px;
            width: 50px;
            padding: 20px;
            background-color: red; 
            border-radius: 35px;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container px-4">
        <div class="row gx-3">

            <div class="col-6">
                <div class="p-5 col1">
                    <img src="img_upload/WLF2022102463034.jpg" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-6">
                <div class="p-3 ">Custom column padding</div>
            </div>
        </div>


        <div class="dislike">
            <a href="" class="" style="text-decoration:none;">
                <span class="divbleu">1</span>
                <img src="image/like.png" class="img-fluid" alt="">
            </a>

            <a href="" class="" style="text-decoration:none;">
                <img src="image/dislike.png" class="img-fluid" alt="">
                <span class="divred">2</span>
            </a>
        </div>


    </div>
</body>
</html>