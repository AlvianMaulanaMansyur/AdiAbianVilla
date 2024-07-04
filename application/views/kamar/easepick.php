<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>easepick 1.2.1 | configurator 1.0.8</title>
    <script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex flex-col justify-center items-center">
        <input class="order-first" id="checkin" />
        <input id="checkout" style="order: -1;"/>
    </div>
    <script>
        const picker = new easepick.create({
            element: "#checkin",

            css: [
                "https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css"
            ],
            zIndex: 10,
            format: "DD MMMM YYYY",
            grid: 2,
            calendars: 2,
            inline: true,
            RangePlugin: {
                // elementEnd: "#checkout",
            },
            plugins: [
                "RangePlugin"
            ]
        })
    </script>
</body>

</html>