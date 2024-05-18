<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lightpick/css/lightpick.css') ?>">
    <script src="https://cdn.jsdelivr.net/npm/moment/min/moment.min.js"></script>


    <title><?php echo $title ?></title>

    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>

<style>
        .daterangepicker {
            z-index: 1050;
            border: none;
            border-radius: 0.375rem; /* Tailwind's rounded-md */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* Tailwind's shadow-lg */
        }
        .daterangepicker .calendar-table {
            background-color: #ffffff; /* Tailwind's bg-white */
            border-radius: 0.375rem; /* Tailwind's rounded-md */
        }
        .daterangepicker td, .daterangepicker th {
            padding: 0.5rem; /* Tailwind's p-2 */
        }
        .daterangepicker .calendar-table .week, .daterangepicker .drp-buttons {
            color: #3b82f6; /* Tailwind's text-blue-500 */
        }
        .daterangepicker .drp-calendar {
            border: none; /* Remove border */
        }
        .daterangepicker .ranges li.active {
            background-color: #3b82f6; /* Tailwind's bg-blue-500 */
            color: #ffffff; /* Tailwind's text-white */
        }
        .daterangepicker .drp-buttons .btn-primary {
            background-color: #3b82f6; /* Tailwind's bg-blue-500 */
            color: #ffffff; /* Tailwind's text-white */
        }
        .daterangepicker .drp-buttons .btn-secondary {
            background-color: #f3f4f6; /* Tailwind's bg-gray-200 */
            color: #374151; /* Tailwind's text-gray-800 */
        }
        .daterangepicker td.disabled, .daterangepicker td.disabled:hover {
            color: #9ca3af; /* Tailwind's text-gray-400 */
            background-color: #f9fafb; /* Tailwind's bg-gray-50 */
            text-decoration: none;
        }
    </style>
</head>
