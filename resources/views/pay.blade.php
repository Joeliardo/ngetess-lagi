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
            overflow: hidden;
        }
        .card-body {
            padding: 2rem;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .alert {
            text-align: center;
        }
        .form-label {
            font-weight: 500;
        }
    </style>
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-sm" style="width: 100%; max-width: 400px;">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">Payment Form</h1>

            <h5 class="text-center mb-4 text-primary">${{ number_format($price, 2) }}</h5>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('updatePaid') }}" onsubmit="return validateForm()">
                @csrf
                <div class="mb-3">
                    <label for="payment_amount" class="form-label">Enter Payment Amount:</label>
                    <input type="number" id="payment_amount" name="payment_amount" class="form-control" required
                        min="1" step="0.01" placeholder="e.g. 10.00">
                    <div class="invalid-feedback" id="amountError"></div>
                </div>

                <input type="hidden" id="price" name="price" value="{{ $price }}">

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Pay Now</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            const paymentAmount = document.getElementById('payment_amount').value;
            const amountError = document.getElementById('amountError');
            amountError.textContent = '';

            if (paymentAmount <= 0) {
                amountError.textContent = 'Please enter a valid amount.';
                document.getElementById('payment_amount').classList.add('is-invalid');
                return false;
            }

            document.getElementById('payment_amount').classList.remove('is-invalid');
            return true;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
