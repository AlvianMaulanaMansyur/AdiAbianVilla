<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

   <!-- Header with Image -->
   <header class="w-full h-64 bg-cover bg-center" style="background-image: url('<?php echo base_url('asset/images/adib2.png') ; ?>');">
        <div class="bg-black bg-opacity-50 w-full h-full flex items-center justify-center">
            <h1 class="text-white text-4xl font-bold">ABOUT US</h1>
        </div>
    </header>


    <!-- Main content -->
    <main class="container mx-auto px-4 py-8">
        <div class="bg-white p-6 rounded shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Adi Abian Villa</h2>
            <p class="mb-4">
            Welcome to Adi Abian Villa, a charming 3-star villa nestled in the serene area of Pecatu, Bali. Our villa offers a perfect blend of traditional Balinese architecture and modern comforts, ensuring an unforgettable stay for our guests.
            </p>
            <h2 class="text-2xl font-semibold mb-4">Location</h2>
            <p class="mb-4">
            Located in the tranquil region of Pecatu, Adi Abian Villa provides a peaceful retreat away from the hustle and bustle of city life. Surrounded by lush greenery and picturesque landscapes, our villa is the ideal destination for those seeking relaxation and rejuvenation. Despite its serene setting, Adi Abian Villa is conveniently close to some of Bali's most famous attractions, including the stunning Uluwatu Temple and the beautiful beaches of Bingin and Padang Padang.
            </p>
            <h2 class="text-2xl font-semibold mb-4">Accommodations</h2>
            <p class="mb-4">
            Adi Abian Villa features elegantly designed rooms that blend traditional Balinese décor with contemporary amenities. Each room is equipped with comfortable bedding, air conditioning, a private bathroom, and complimentary Wi-Fi. Our accommodations are designed to provide a cozy and restful environment for our guests, ensuring a comfortable and memorable stay.
            </p>
            <h2 class="text-2xl font-semibold mb-4">Experiences</h2>
            <p class="mb-4">
            At Adi Abian Villa, we pride ourselves on delivering exceptional hospitality and personalized service. Whether you are here for a romantic getaway, a family vacation, or a solo retreat, our dedicated team is committed to making your stay as enjoyable and comfortable as possible.
            </p>
            <p class="mb-4">
            Discover the beauty and tranquility of Pecatu, Bali, and experience the warm hospitality of Adi Abian Villa. We look forward to welcoming you and creating unforgettable memories together.
            </p>
        </div>
    </main>
    
    <!-- Back button -->
    <div class="container mx-auto px-4 py-4 text-center">
        <a href="javascript:history.back()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Back To Home</a>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; <?php echo date("Y"); ?> Adi Abian Villa. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
