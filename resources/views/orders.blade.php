<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
    {{-- @vite('resources/css/orders.css') --}}
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
*{
    font-family: 'Plus Jakarta Sans', sans-serif;
}

</style>
<body>
    <x-navbar />
          <!-- content -->
          <section class="bg-light border-top py-4">
              <div class="container">
                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th scope="col">Order Id</th>
                              <th scope="col">User Id</th>
                              <th scope="col">User Phone Number</th>
                              <th scope="col">Product Id</th>
                              <th scope="col">UKM</th>
                              <th scope="col">Payment Image</th>
                              <th scope="col">Payment Status</th>
                              @if($user->is_admin==1)
                              <th scope="col">Action</th>
                              @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order )
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->user_id}}</td>
                            <td>{{$order->user->phone_number}}</td>
                            <td><a href="/product/{{$order->product_id}}">{{$order->product_id}}</a></td>
                            <td><a href="/{{$order->ukm->short_name}}">{{$order->ukm->short_name}}</a></td>
                            <td><a href="{{asset($order->payment_image)}}" target="_blank"> {{$order->payment_image}}</a></td>
                            <td>{{$order->payment_status}}</td>
                            @if($user->is_admin==1 && $order->payment_status=="pending")
                                <form action="/verify-order" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <td><button type="submit" class="btn-primary btn"> Verify</button></td>
                                </form>
                            @elseif($user->is_admin!=1 && $order->payment_status=="pending")
                            @else
                                <td>-</td>
                            @endif
                        </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                    @forelse($orders as $order)

                    @empty
                    <h1>Empty</h1>
                    @endforelse
                </div>


          </section>
    <x-footer />
</body>
<script src="{{asset('js/orders.js')}}"></script>


</html>
