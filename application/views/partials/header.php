<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lightpick/css/lightpick.css') ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    

    <title><?php echo $title ?></title>

    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>

    <style>
    .container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 10px; /* Adjust the gap as needed */
}

.input-container {
    display: flex;
    gap: 10px; /* Adjust the gap between inputs */
}

.datepicker-input {
    margin-bottom: 0;
    background-color: #f8f9fa;
    border: 1px solid #ced4da;
    color: #495057;
    font-size: 1rem;
    border-radius: 0.25rem;
    padding: 0.375rem 0.75rem;
    display: block;
    width: auto;
    flex-grow: 1;
    border: none;
}

#default-carousel .relative {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.carousel-item {
    width: 33.3333%; /* Adjust the width to show part of next/previous items */
    transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
}

#default-carousel {
    overflow: hidden;
}

#default-carousel .carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}


    </style>
</head>
