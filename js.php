<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toggle Block Animation</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        #toggleBlock {
            overflow: hidden;
            height: 0;
            transition: height 0.3s ease;
        }

        #toggleBlock.visible {
            height: auto;
            /* This will be overridden by JavaScript to calculate exact height */
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <form id="myForm">
        <button type="submit">Submit</button>
    </form>
    <div id="toggleBlock" class="hidden">
        <p>This is a toggle block</p>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('myForm');
            const toggleBlock = document.getElementById('toggleBlock');

            form.addEventListener('submit', (event) => {
                event.preventDefault(); // Предотвращаем отправку формы

                if (toggleBlock.classList.contains('visible')) {
                    hideBlock(toggleBlock);
                } else {
                    showBlock(toggleBlock);
                }
            });

            function showBlock(block) {
                block.classList.remove('hidden');
                const height = block.scrollHeight + 'px';
                block.style.height = height;

                block.addEventListener('transitionend', function handler() {
                    block.style.height = 'auto';
                    block.removeEventListener('transitionend', handler);
                });

                block.classList.add('visible');
            }

            function hideBlock(block) {
                const height = block.scrollHeight + 'px';
                block.style.height = height;

                requestAnimationFrame(() => {
                    block.style.height = '0';
                });

                block.addEventListener('transitionend', function handler() {
                    block.classList.add('hidden');
                    block.removeEventListener('transitionend', handler);
                });

                block.classList.remove('visible');
            }
        });
    </script>
</body>

</html>