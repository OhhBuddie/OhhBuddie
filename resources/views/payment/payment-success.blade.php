<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Payment Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-success">
                    <div class="card-header bg-success text-white">
                        <h3 class="mb-0">Payment Successful!</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-check-circle-fill text-success" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </div>
                        
                        <h4>Transaction Details</h4>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th width="30%">Order ID</th>
                                    <td>{{ $transaction->order_id }}</td>
                                </tr>
                                <tr>
                                    <th>Transaction ID</th>
                                    <td>{{ $transaction->txn_id }}</td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td>₹{{ number_format($transaction->amount, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $transaction->first_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $transaction->email }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Method</th>
                                    <td>{{ ucfirst($transaction->payment_method) }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><span class="badge bg-success">{{ ucfirst($transaction->status) }}</span></td>
                                </tr>
                                <tr>
                                    <th>Date & Time</th>
                                    <td>{{ $transaction->updated_at->format('d M, Y h:i A') }}</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <div class="mt-4 text-center">
                            <a href="/" class="btn btn-primary">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>