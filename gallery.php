<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: sans-serif;
        }
        h1 {
            color: coral;
        }
        .grid-container {
            columns: 5 200px;
            column-gap: 1.5rem;
            width: 90%;
            margin: 0 auto;
        }
        .grid-container div {
            width: 150px;
            margin: 0 1.5rem 1.5rem 0;
            display: inline-block;
            width: 100%;
            border: solid 2px black;
            padding: 5px;
            box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
            border-radius: 5px;
            transition: all .25s ease-in-out;
        }
        .grid-container div:hover img {
            filter: grayscale(0);
        }
        .grid-container div:hover {
            border-color: coral;
        }
        .grid-container div img {
            width: 100%;
            filter: grayscale(100%);
            border-radius: 5px;
            transition: all .25s ease-in-out;
        }
        .grid-container div p {
            margin: 5px 0;
            padding: 0;
            text-align: center;
            font-style: italic;
        }
    </style>
</head>
<body>

    <h1>Capturing Moments of the Backbone of our Country</h1>
    <div class="grid-container">
        <div>
            <img class='grid-item grid-item-1' src='gallery/image1.jpg' alt=''>
            <p>"I'm so happy today!"</p>
        </div>
        <div>
            <img class='grid-item grid-item-2' src='gallery/image2.jpg' alt=''>
            <p>"I see those nugs."</p>
        </div>
        <div>
            <img class='grid-item grid-item-3' src='gallery/image3.jpeg' alt=''>
            <p>"I love you so much!"</p>
        </div>
        <div>
            <img class='grid-item grid-item-4' src='gallery/image4.jpg' alt=''>
            <p>"I'm the baby of the house!"</p>
        </div>
        <div>
            <img class='grid-item grid-item-5' src='gallery/image5.jpg' alt=''>
            <p>"Are you gunna throw the ball?"</p>
        </div>
        <div>
            <img class='grid-item grid-item-6' src='gallery/image5.jpg' alt=''>
            <p>"C'mon friend!"</p>
        </div>
        <div>
            <img class='grid-item grid-item-7' src='gallery/image7.jpg' alt=''>
            <p>"A rose for mommy!"</p>
        </div>
        <div>
            <img class='grid-item grid-item-8' src='gallery/image4.jpg' alt=''>
            <p>"You gunna finish that?"</p>
        </div>
        <div>
            <img class='grid-item grid-item-9' src='gallery/image6.jpg' alt=''>
            <p>"We can't afford a cat!"</p>
        </div>
        <div>
            <img class='grid-item grid-item-10' src='gallery/image7.jpg' alt=''>
            <p>"Dis my fren!"</p>
        </div>
    </div>

</body>
</html>
