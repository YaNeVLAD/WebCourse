<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizontal Slider</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .slider-container {
            width: 370px;
            overflow: hidden;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .slider-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slider-item {
            min-width: 100%;
            height: 400px;
            box-sizing: border-box;
            padding: 20px;
            text-align: center;
            background-color: #f3f3f3;
            border-right: 1px solid #ccc;
        }

        button {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="slider-container">
        <div class="slider-wrapper">
            <div class="slider-item">Item 1</div>
            <div class="slider-item">Item 2</div>
            <div class="slider-item">Item 3</div>
            <div class="slider-item">Item 4</div>
        </div>
    </div>
    <button class="prev-btn">Prev</button>
    <button class="next-btn">Next</button>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sliderWrapper = document.querySelector('.slider-wrapper');
            const sliderItems = document.querySelectorAll('.slider-item');
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            let currentIndex = 0;

            const updateSliderPosition = () => {
                const offset = -currentIndex * 100;
                sliderWrapper.style.transform = `translateX(${offset}%)`;
            };

            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                } else {
                    currentIndex = sliderItems.length - 1;
                }
                updateSliderPosition();
            });

            nextBtn.addEventListener('click', () => {
                if (currentIndex < sliderItems.length - 1) {
                    currentIndex++;
                } else {
                    currentIndex = 0;
                }
                updateSliderPosition();
            });
        });
        document.addEventListener('DOMContentLoaded', () => {
            const sliderWrapper = document.querySelector('.slider-wrapper');
            const sliderItems = document.querySelectorAll('.slider-item');
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            let currentIndex = 0;

            const updateSliderPosition = () => {
                const offset = -currentIndex * 100;
                sliderWrapper.style.transform = `translateX(${offset}%)`;
            };

            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                } else {
                    currentIndex = sliderItems.length - 1;
                }
                updateSliderPosition();
            });

            nextBtn.addEventListener('click', () => {
                if (currentIndex < sliderItems.length - 1) {
                    currentIndex++;
                } else {
                    currentIndex = 0;
                }
                updateSliderPosition();
            });
        });
    </script>
</body>

</html>