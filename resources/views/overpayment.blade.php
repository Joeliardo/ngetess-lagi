<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card {
            border-radius: 15px;
            padding: 1.5rem;
        }

        .btn-success, .btn-warning {
            width: 48%;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        p {
            font-size: 1.1rem;
        }
    </style>
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-sm text-center" style="max-width: 500px;">
        <div class="card-body">
            <h1 class="card-title mb-4 text-danger">Overpayment</h1>
            <p class="mb-4">Overpaid by <strong>${{ number_format($amount, 2) }}</strong>. Would you like to apply this to your balance?</p>

            <form method="POST" action="{{ route('process.overpayment') }}">
                @csrf
                <input type="hidden" name="amount" value="{{ $amount }}">
                <input type="hidden" name="payment_amount" value="{{ $payment_amount }}">
                <input type="hidden" name="price" value="{{ $price }}">

                <div class="d-grid gap-2 d-md-flex justify-content-center">
                    <button type="submit" name="action" value="accept" class="btn btn-success">Yes, add to wallet</button>
                    <button type="submit" name="action" value="decline" class="btn btn-warning">No, correct amount</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
