@extends('layouts.userlayout')
@section('contents')
<section class="m-profile">
    <div class="container">
        <h4 class="main-title mb-4">Pricing Plan</h4>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="sign-user_card">
                    <div class="table-responsive pricing pt-2">
                        <table id="my-table" class="table">
                           <thead>
                              <tr>
                                 <th class="text-center prc-wrap"></th>
                                 @foreach ($subs as $sub)
                                 <th class="text-center prc-wrap">
                                     <div class="prc-box">
                                        <div class="h3 pt-4 text-white">$ {{$sub->charge}}<small> / {{$sub->type}}</small></div>
                                        <span class="type">{{$sub->type}}</span>
                                     </div>
                                  </th>
                                 @endforeach
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <th class="text-center" scope="row">New Movies</th>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>

                              </tr>
                              <tr>
                                 <th class="text-center" scope="row">Streamit Special</th>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>

                              </tr>
                              <tr>
                                 <th class="text-center" scope="row">American Tv Shows</th>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>

                              </tr>
                              <tr>
                                 <th class="text-center" scope="row">Hollywood Movies</th>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>

                              </tr>
                              <tr>
                                 <td class="text-center child-cell">Video Quality</td>
                                 <td class="text-center child-cell">FHD (1080p)</td>
                                 <td class="text-center child-cell">FHD (1080p)</td>
                                 <td class="text-center child-cell">FHD (1080p)</td>
                                 <td class="text-center child-cell">FHD (1080p)</td>
                                 <td class="text-center child-cell">FHD (1080p)</td>

                              </tr>
                              <tr>
                                 <th class="text-center" scope="row">Ad Free Entertainment</th>
                                 <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                 <td class="text-center child-cell active"><i class="ri-close-line i_close"></i>
                                 </td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                 <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>

                              </tr>
                              <tr>
                                 <td class="text-center" colspan="6">
                                     <a data-toggle="modal"
                                             data-target="#addsubs"
                                             class="btn btn-outline-primary mt-3">Set Subscription and Billing Type</a>
                                  </td>

                              </tr>
                           </tbody>
                        </table>
                     </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <form class="form-horizontal" method="POST"
                    action="{{route('user-setpricing')}}">
 @csrf
        <div class="modal fade"
            id="addsubs">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h4 class="modal-title">Set Rates
                        </h4>
                        <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if ($user_billing != null)
                        <div class="row">
                            <div class="col-md-12">
                                Current Configuration ({{$user_billing->billing_type->type}} - {{$user_billing->subscription_type->type}})
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <label>Billing Type</label>
                                <select name="billing_type" class="form-control">
                                    @foreach ($bills as $bill)
                                    <option value="{{$bill->id}}">{{$bill->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Subscription Type</label>
                                <select name="subscription_type" class="form-control">
                                    @foreach ($subs as $sub)
                                        <option value="{{$sub->id}}">{{$sub->type}} | Price: {{$sub->charge}}</option>
                                    @endforeach
                                </select>
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
