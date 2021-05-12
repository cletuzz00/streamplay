@extends('layouts.userlayout')
@section('contents')
    <!-- MainContent -->
    <section class="m-profile manage-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>Credit</th>
                                    <th>Debit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bills as $bill)
                                    <tr>
                                        <td>{{$bill->id}}</td>
                                        <td>{{$bill->credit}}</td>
                                        <td>{{$bill->debit}}</td>
                                    </tr>
                                @empty
                                    <td colspan="3"> No Transaction or Bills Posted</td>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- Balance = $ {{Auth::user()->credit() - Auth::user()->debit()}} --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

 @endsection
