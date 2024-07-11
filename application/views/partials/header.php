<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   aa
    <!-- <link rel="stylesheet" href="./src/output.css'"> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> -->

    <link rel="icon" href="<?php echo base_url('asset/images/adibian.png')?>">

    <title><?php echo $title ?></title>

<link rel="icon" href="<?= base_url('asset/images/adibian.png'); ?>">

    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>

    <style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

* {
    font-family: "Inter", sans-serif;

}
.ketersediaan{
    font-family: "Inter", sans-serif;
}
    .container {
    display: flex;
    /* flex-direction: column; */
    align-items: flex-start;
    gap: 10px; /* Adjust the gap as needed */
}

.input-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px; /* Adjust the gap between inputs */
        }
        @media (min-width: 640px) {
            .input-container {
                gap: 20px; /* Adjust the gap between inputs for larger screens */
            }
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


    </style>
</head>
