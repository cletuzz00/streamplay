@extends('layouts.adminlayout')
@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">User Lists</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="table-view">
                    <table class="data-tables table movie_table" style="width:100%">
                      <thead>
                         <tr>
                            <th style="width: 10%;">Name</th>
                            <th style="width: 20%;">Email</th>
                            <th style="width: 10%;">Status</th>
                            <th style="width: 10%;">Join Date</th>
                            <th style="width: 10%;">Action</th>
                         </tr>
                      </thead>
                      <tbody>
                          @forelse ($users as $user)
                              <tr>
                                  <td>{{$user->name}}</td>
                                  <td>{{$user->email}}</td>
                                  <td>{{$user->status}}</td>
                                  <td>{{$user->created_at}}</td>
                                  <td>Bill</td>
                              </tr>
                          @empty
                              <td colspan="5"><p>No Users Saved</p></td>
                          @endforelse
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
