@extends('layouts.adminlayout')
@section('contents')
<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
          <div class="iq-card">
             <div class="iq-card-body">
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
                                        class="btn btn-outline-primary mt-3">Set Rates for Subscriptions</a>
                             </td>

                         </tr>
                      </tbody>
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <form class="form-horizontal" method="POST"
                    action="{{route('updatesubs')}}">
 @csrf
        <div class="modal fade"
            id="addsubs">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
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
                        <div class="row">
                            <div class="col-md-12">
                                <table id="users1"
                                    class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Subscription Type</th>
                                            <th>Charge</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subs as $line)
                                        <tr>
                                            <td><input type="hidden" name="type[]" value="{{$line->id}}">{{ $line->type }}</td>
                                            <td><input class="form-control" type="number" step=".01" name="rate[]" value="{{ $line->charge }}" required></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
