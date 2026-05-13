<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculture Website</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            line-height: 1.6;
        }

        /* Header Styles */
        header {
            background-color: #68a73c;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        header p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        /* Main Content Styles */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 40px;
        }

        /* Featured Products Section Styles */
        .featured-products {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .product {
            width: 300px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .product:hover {
            transform: translateY(-5px);
        }

        .product img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .product-info {
            padding: 20px;
        }

        .product-info h3 {
            margin-bottom: 10px;
        }

        .product-info p {
            font-size: 0.9rem;
        }

        /* Footer Styles */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Welcome to Our Agriculture Website</h1>
        <p>Discover high-quality agricultural products and sustainable farming practices.</p>
    </header>

    <!-- Main Content -->
    <div class="container">
        <!-- Featured Products Section -->
        <section id="featured-products">
            <h2 class="section-heading">Featured Products</h2>
            <div class="featured-products">
                <div class="product">
                    <img src="product1.jpg" alt="Product 1">
                    <div class="product-info">
                        <h3>Organic Fertilizer</h3>
                        <p>Boost your crop yield with our organic fertilizer.</p>
                    </div>
                </div>
                <div class="product">
                    <img src="product2.jpg" alt="Product 2">
                    <div class="product-info">
                        <h3>Herbicide</h3>
                        <p>Protect your crops from weeds with our effective herbicide.</p>
                    </div>
                </div>
                <div class="product">
                    <img src="product3.jpg" alt="Product 3">
                    <div class="product-info">
                        <h3>Vegetable Seeds</h3>
                        <p>Grow fresh vegetables with our high-quality seeds.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Agriculture Website. All rights reserved.</p>
    </footer>
</body>
</html>
