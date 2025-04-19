<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Payment Failed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <h3 class="mb-0">Payment Failed</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-x-circle-fill text-danger" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                            </svg>
                        </div>
                        
                        <div class="alert alert-danger">
                            <p class="mb-0">Your payment could not be processed. Please try again or contact support.</p>
                        </div>
                        
                        <h4>Transaction Details</h4>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th width="30%">Order ID</th>
                                    <td>{{ $transaction->order_id }}</td>
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
                                    <th>Status</th>
                                    <td><span class="badge bg-danger">{{ ucfirst($transaction->status) }}</span></td>
                                </tr>
                                <tr>
                                    <th>Date & Time</th>
                                    {{-- <td>{{ $transaction->updated_at->format('d M, Y h:i A') }}</td> --}}
                                    <td>{{ \Carbon\Carbon::parse($transaction->updated_at)->format('d M, Y h:i A') }}</td>


                                </tr>
                            </tbody>
                        </table>
                        
                        <div class="mt-4 text-center">
                            <a href="/addtocart" class="btn btn-primary">Try Again</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>