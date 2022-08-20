@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        @php
            $count = 0;
        @endphp
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Orders</span></h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
 
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>

                                <th>Order Number</th>
                                <th>Customer Name</th>
                                <th>Product Quantity</th>
                                <th>Order Status</th>
                                <th>Order Address</th>
                                <th>Order Phone</th>
                                <th>Order Total</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($OrderJoin as $item)
                                <tr>


                                    <td>
                                        {{ $item->id }}
                                    </td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $item->UserName }}</strong>
                                    </td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        {{ $item->product_quantity }}
                                    </td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <?php
                                            if($item->order_status == 0){
                                                ?>
                                        <span class="badge rounded-pill bg-secondary">Pending</span>
                                        <?php
                                            }elseif($item->order_status == 1){?>
                                        <span class="badge rounded-pill bg-primary">Processing</span>
                                        <?php
                                            }elseif($item->order_status == 2){?>
                                        <span class="badge rounded-pill bg-danger">Shipped</span>
                                        <?php
                                            }elseif($item->order_status == 3){
                                                ?>
                                        <span class="badge rounded-pill bg-success"> Delivered</span>
                                        <?php
                                            }elseif($item->order_status == 4){?>
                                        <span class="badge rounded-pill bg-info">Cancelled</span>
                                        <?php
                                          }
                                        ?>

                                    </td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        {{ $item->address }}
                                    </td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        {{ $item->phonenumber }}
                                    </td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        {{ $item->order_total_price }}
                                    </td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        {{ $item->created_at }}
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <form action="{{ route('cancel', $item->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item"><i
                                                            class="bx bx-edit-alt me-1"></i>
                                                        Cancel</button>
                                                </form>
                                                <form action="{{ route('shipped', $item->id) }}" method="post">
                                                    @csrf
                                                    <button class="dropdown-item"><i
                                                            class="bx bx-edit-alt me-1"></i>
                                                        Shipped</button>
                                                </form>
                                                <form action="{{ route('pending', $item->id) }}" method="post">
                                                    @csrf
                                                    <button class="dropdown-item"><i
                                                            class="bx bx-edit-alt me-1"></i>
                                                        pending</button>
                                                </form>
                                                <form action="{{ route('delevered', $item->id) }}" method="post">
                                                    @csrf
                                                     <button class="dropdown-item" ><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    delivered</button>
                                                </form>
                                                <form action="{{ route('process', $item->id) }}" method="post">
                                                    @csrf
                                                    <button class="dropdown-item"
                                                        ><i
                                                            class="bx bx-edit-alt me-1"></i>
                                                        processing</button>
                                                </form>


                                                <form action="{{ route('orders.destroy', $item->id) }}" method="POST"
                                                    class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <span class="dropdown-item"><i class="bx bx-trash me-1"></i> <button
                                                            style="border: none; background-color:transparent;margin:0;padding:0;font-weight: 400;
                                                     color: #697a8d;">Delete</button></span>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- / Content -->

        <!-- Footer -->
    @endsection
