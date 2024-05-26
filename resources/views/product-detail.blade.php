<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Announcement</title>
    {{-- @vite('resources/css/products-detail.css') --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/productsDetail.css') }}"> --}}
    <link rel="stylesheet" href="/css/productsDetail.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <x-navbar />
          <!-- content -->
          <section class="py-5">
            <div class="container">
              <div class="row gx-5">
                <aside class="col-lg-6">
                  <div class="border rounded-4 mb-3 d-flex justify-content-center">
                    <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="">
                      <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{asset($product->image)}}" />
                    </a>
                  </div>
                  <!-- thumbs-wrap.// -->
                  <!-- gallery-wrap .end// -->
                </aside>
                <main class="col-lg-6">
                  <div class="ps-lg-3">
                    <h4 class="title text-dark">
                      {{$product->name}}
                    </h4>
                    <div class="d-flex flex-row my-3">
                      <div class="text-warning mb-1 me-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="ms-1">
                          4.5
                        </span>
                      </div>
                      <span class="text-muted"><i class="bi bi-basket fa-sm mx-1"></i>154 orders</span>
                      <span class="text-success ms-2">In stock</span>
                    </div>

                    <div class="mb-3">
                      <span class="h2 fw-bold">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                      <span class="text-muted">/per item</span>
                    </div>

                    <p>
                      {{$product->short_description}}
                    </p>

                    <div class="row">
                      <dt class="col-3">Color</dt>
                      <dd class="col-9">{{$product->color}}</dd>

                      <dt class="col-3">Material</dt>
                      <dd class="col-9">{{$product->material}}</dd>
                    </div>

                    <hr />

                    <div class="row mb-4">
                      <!-- col.// -->
                      <div class="col-md-4 col-6 mb-1">
                        <label class="mb-2 d-block">Quantity</label>
                        <div class="input-group mb-3" style="width: 170px;">
                            <button class="btn btn-white border border-secondary px-3" type="button" id="button-minus" data-mdb-ripple-color="dark">
                                <i class="bi bi-dash"></i>
                            </button>
                            <input type="number" class="form-control text-center border border-secondary" id="quantity" name="quantity" value="1" aria-label="Quantity input" aria-describedby="button-addon1" />
                            <button class="btn btn-white border border-secondary px-3" type="button" id="button-plus" data-mdb-ripple-color="dark">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                    </div>
                    </div>
                    <a href="#" class="btn btn-warning shadow-0" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" onclick="updateReceipt()"> Buy now </a>
                  </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        @if(!$order || $order->payment_status == "paid")
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
                            <button type="button" class="close btn h" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="h3">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="well col-xs-12 col-sm-12 col-md-12 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                                            <div class="row">
                                                <div class="text-center">
                                                    <h1>Receipt</h1>
                                                </div>
                                                </span>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>#</th>
                                                            <th class="text-center">Price</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="col-md-9"><em id="receipt-product-name">{{$product->name}}</em></h4></td>
                                                            <td class="col-md-1" style="text-align: center" id="receipt-quantity">1</td>
                                                            <td class="col-md-1 text-center" id="receipt-price">$13</td>
                                                            <td class="col-md-1 text-center" id="receipt-total">$26</td>
                                                        </tr>
                                                        <tr>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td class="text-right"><strong>Subtotal: </strong></td>
                                                            <td class="text-end" id="receipt-subtotal"><strong>Rp{{ number_format($product->price, 0, ',', '.') }}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td class="text-right"><strong>Admin Fee: </strong></td>
                                                            <td class="text-end"><strong>Rp2.000</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                                            <td class="text-center text-danger" id="receipt-grand-total"><h4><strong>Rp{{ number_format($product->price + 2000, 0, ',', '.') }}</strong></h4></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <form action="/add-order" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="ukm_id" value="{{ $product->ukm->id }}">
                                                    <div class="wrapper mt-0">
                                                        <p>Silahkan lakukan pembayaran ke <br> BCA: 34353443534</p>
                                                        <img src="/assets/Qris.jpeg" class="qris-image">
                                                        <div class="container">
                                                            <h1>Upload bukti pembayaran</h1>
                                                            <div class="upload-container">
                                                                <div class="border-container">
                                                                    <div class="icons fa-4x">
                                                                        <i class="bi bi-file-image icon-transform shrink-3 down-2 left-6 rotate--45"></i>
                                                                        <i class="bi bi-file-text icon-transform shrink-2 up-4"></i>
                                                                        <i class="bi bi-file-pdf icon-transform shrink-3 down-2 right-6 rotate-45"></i>
                                                                    </div>
                                                                    <input type="file" id="file-upload" name="payment_image" style="display: none;" multiple>
                                                                    <p>Drag and drop files here, or <a href="#" id="file-browser">browse</a> your computer.</p>
                                                                </div>
                                                                <div id="file-list" class="mt-3"></div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    @else
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
                            <button type="button" class="close btn h" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="h3">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <i class="bi bi-clock h1"></i>
                                    <h1>Your payment is {{$order->payment_status}}</h1>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endif
                </div>
                </main>
              </div>
            </div>
          </section>
          <!-- content -->

          <section class="bg-light border-top py-4">
            <div class="container">
              <div class="row gx-4">
                <div class="col-lg-8 mb-4">
                  <div class="border rounded-2 shadow-0 px-3 py-2 bg-white">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Seller Profile</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active border rounded-2 shadow-0 px-3 py-2" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                {{$product->long_description}}
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="card-body">
                                    <div class="list-group">
                                        <a href="/{{$product->ukm->short_name}}" class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center pb-1" id="tooltips-container">
                                                <img src="{{asset($product->ukm->logo)}}" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                                <div class="w-100 ms-2">
                                                    <h5 class="mb-1">{{$product->ukm->short_name}}<i class="mdi mdi-check-decagram text-info ms-1"></i></h5>
                                                    <p class="mb-0 font-13 text-muted">{{$product_count}} Products</p>
                                                </div>
                                                <i class="bi bi-chevron-right h4"></i>
                                            </div>
                                        </a>
                                    </div>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="px-0 border rounded-2 shadow-0">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">You might like</h5>
                        @forelse($similar_items as $item)
                            <div class="d-flex mb-3">
                            <a href="/product/{{$item->id}}" class="me-3">
                                <img src="{{asset($item->image)}}" style="width: 150px; height: 96px;" class="img-md img-thumbnail" />
                            </a>
                            <div class="info">
                                <a href="/product/{{$item->id}}" class="nav-link mb-1">
                                {{$item->name}}
                                </a>
                                <strong class="text-dark">Rp{{ number_format($product->price, 0, ',', '.') }}</strong>
                            </div>
                            </div>
                        @empty
                            <p>Empty</p>
                        @endforelse
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    <x-footer />
</body>
<script src="/js/products-detail.js"></script>
<script>

function updateReceipt() {
    var quantity = document.getElementById('quantity').value;
    var price = {{ $product->price }};
    var total = quantity * price;
    var adminFee = 2000;
    var grandTotal = total + adminFee;

    document.getElementById('receipt-quantity').innerText = quantity;
    document.getElementById('receipt-price').innerText = 'Rp' + number_format(price, 0, ',', '.');
    document.getElementById('receipt-total').innerText = 'Rp' + number_format(total, 0, ',', '.');
    document.getElementById('receipt-subtotal').innerHTML = '<strong>Rp' + number_format(total, 0, ',', '.') + '</strong>';
    document.getElementById('receipt-grand-total').innerHTML = '<h4><strong>Rp' + number_format(grandTotal, 0, ',', '.') + '</strong></h4>';
}

function number_format(number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? '.' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? ',' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}
</script>

</html>
