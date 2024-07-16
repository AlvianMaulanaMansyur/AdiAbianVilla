<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Hotale &#8211; Hotel HTML Template</title>

    <!-- <script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js"></script> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" /> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lightpick/css/lightpick.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/kamar/js/plugins/goodlayers-core/plugins/fontawesome/font-awesome.css') ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url('assets/kamar/js/plugins/goodlayers-core/plugins/fa5/fa5.css') ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url('assets/kamar/js/plugins/goodlayers-core/plugins/elegant/elegant-font.css') ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url('assets/kamar/js/plugins/goodlayers-core/plugins/ionicons/ionicons.css') ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url('assets/kamar/js/plugins/goodlayers-core/plugins/simpleline/simpleline.css') ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url('assets/kamar/js/plugins/goodlayers-core/plugins/gdlr-custom-icon/gdlr-custom-icon.css') ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url('assets/kamar/js/plugins/goodlayers-core/plugins/style.css') ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url('assets/kamar/js/plugins/goodlayers-core/include/css/page-builder.css') ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url('assets/kamar/js/plugins/tourmaster/tourmaster.css') ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url('assets/kamar/css/tourmaster-global-style-custom.css') ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url('assets/kamar/js/plugins/tourmaster/room/tourmaster-room.css') ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url('assets/kamar/css/tourmaster-room-style-custom.css?1653843108&#038;ver=6.0.1') ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url('assets/kamar/css/style-core.css') ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url('assets/kamar/css/hotale-style-custom.css?1653801118&#038;ver=6.0.1') ?>" type="text/css" media="all" />

    <link rel="stylesheet" id="gdlr-core-google-font-css" href="https://fonts.googleapis.com/css?family=Jost%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2Citalic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CAmiri%3Aregular%2Citalic%2C700%2C700italic%7CAllison%3Aregular&#038;subset=cyrillic%2Clatin%2Clatin-ext%2Carabic%2Cvietnamese&#038;ver=6.0.1" type="text/css" media="all" />

    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>

    <style>
        .input-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            /* Adjust the gap between inputs */
        }

        @media (min-width: 768px) {
            .input-container {
                justify-content: center;
                /* Adjust the gap between inputs for larger screens */
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