<!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <link rel="stylesheet" href="./public/style.css">
        <title>Voting System</title>
      </head>
      <style>
        /* Styles for the overlay background */
        body {
            margin: 0;

        }

        /* Styles for the overlay background */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* semi-transparent black background */
            align-items: center;
            justify-content: center;
        }

        /* Styles for the modal */
        .modal {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
      <body class="bg-secondary">
