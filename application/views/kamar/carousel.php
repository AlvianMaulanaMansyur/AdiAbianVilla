<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .carousel {
            overflow: hidden;
            margin: 20px auto; /* Menyesuaikan dengan kebutuhan Anda */
            width: 80%; /* Menyesuaikan dengan kebutuhan Anda */
        }

        .carousel-container {
            display: flex;
            transition: transform 0.5s ease;
        }

        .carousel-item {
            flex: 0 0 auto;
            margin-right: 10px; /* Sesuaikan dengan kebutuhan Anda */
        }

        .carousel-item img {
            max-width: 100%;
            height: auto;
        }

        .prev, .next {
            cursor: pointer;
            background-color: #ddd;
            border: none;
            color: #333;
            padding: 10px 20px;
            margin: 10px; /* Menyesuaikan dengan kebutuhan Anda */
            border-radius: 5px;
        }
    </style>
</head>

<body>
<div class="carousel">
    <button class="prev">Previous</button>

    <div class="carousel-container">
        <div class="carousel-item"><img src="https://assets.codepen.io/108082/jake-and-fin-1.jpg" alt="Slide 1"></div>
        <div class="carousel-item"><img src="https://assets.codepen.io/108082/jake-and-fin-2.jpg" alt="Slide 2"></div>
        <div class="carousel-item"><img src="https://assets.codepen.io/108082/jake-and-fin-3.jpg" alt="Slide 3"></div>
        <!-- Add more slides as needed -->
    </div>
    <button class="next">Next</button>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const carousel = document.querySelector(".carousel");
        const container = document.querySelector(".carousel-container");
        const items = document.querySelectorAll(".carousel-item");
        const itemCount = items.length;
        const itemWidth = items[0].clientWidth;

        let currentIndex = 0;

        function slide(direction) {
            if (direction === "next") {
                currentIndex++;
                if (currentIndex >= itemCount) {
                    currentIndex = 0;
                }
            } else {
                currentIndex--;
                if (currentIndex < 0) {
                    currentIndex = itemCount - 1;
                }
            }
            container.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
        }

        document.querySelector(".prev").addEventListener("click", function() {
            slide("prev");
        });

        document.querySelector(".next").addEventListener("click", function() {
            slide("next");
        });
    });
</script>
</body>
</html>
