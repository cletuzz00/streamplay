@extends('layouts.userlayout')
@section('contents')
    <!-- MainContent -->
    <section class="m-profile manage-p">
        <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-lg-10">
                    <div class="sign-user_card">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="upload_profile d-inline-block">
                                <img src="{{asset('images/user/user.jpg')}}" class="profile-pic rounded-circle img-fluid" alt="user">
                                <div class="p-image">
                                    <i class="ri-pencil-line upload-button"></i>
                                    <input class="file-upload" type="file" accept="image/*">
                                </div>
                                </div>
                            </div>
                           @if ($user_card == null)
                            <div class="col-lg-10 device-margin">
                                <div class="profile-from">
                                    <h4 class="mb-3">Credit Card Details</h4>&nbsp; <a href="/user/statement"
                                    class="btn btn-outline-success mt-3">View Statement</a>
                                    <form class="mt-4" method="POST" action="/user/credit/card/add">
                                        @csrf
                                        <div class="form-group">
                                            <label>Card Name</label>
                                            <input type="text" class="form-control mb-0" id="exampleInputl2" name="name"
                                                placeholder="Enter Your Name" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Card Number</label>
                                            <input type="text" class="form-control date-input basicFlatpickr mb-0" name="number" placeholder="Select Date" id="exampleInputPassword2"
                                            required>
                                        </div>
                                        <div class="form-group d-flex flex-md-row flex-column">
                                            <input type="text" name="expiry" class="form-control mb-0" id="exampleInputl2"
                                            placeholder="Enter Card expiry" autocomplete="off" required>
                                            <input type="text" name="cvv" class="form-control mb-0" id="exampleInputl2"
                                            placeholder="Enter card cvv" autocomplete="off" required>
                                        </div>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-hover">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                           @else
                           <div class="col-lg-10 device-margin">
                            <div class="profile-from">
                                <h4 class="mb-3">Credit Card Details</h4> <button data-toggle="modal"
                                data-target="#addsubs"
                                class="btn btn-outline-primary mt-3">Make a Payment</button>&nbsp;<a href="/user/statement"
                                class="btn btn-outline-success mt-3">View Statement</a>
                                <form class="mt-4" method="POST" action="/user/credit/card/add">
                                    @csrf
                                    <div class="form-group">
                                        <label>Card Name</label>
                                        <input type="text" class="form-control mb-0" id="exampleInputl2"
                                            value="{{ $user_card->name}}" name="name" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Card Number</label>
                                        <input type="text" name="number" class="form-control date-input basicFlatpickr mb-0" value="{{ $user_card->number}}" id="exampleInputPassword2"
                                        required>
                                    </div>
                                    <div class="form-group d-flex flex-md-row flex-column">
                                        <input type="text" class="form-control mb-0" id="exampleInputl2"
                                        value="{{ $user_card->expiry}}" name="expiry" autocomplete="off" required>
                                        <input type="text" class="form-control mb-0" id="exampleInputl2"
                                        value="{{ $user_card->cvv}}" name="cvv" autocomplete="off" required>
                                    </div>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-hover">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                           @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form class="form-horizontal" method="POST"
                    action="{{route('user-makepayment')}}">
 @csrf
        <div class="modal fade"
            id="addsubs">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h4 class="modal-title">Make Payment
                        </h4>
                        <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Amount to be paid</label>
                                    <input  class="form-control" type="number" step=".01" name="amount" required>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.modal -->
 </form>
 @endsection
