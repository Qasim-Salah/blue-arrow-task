@extends('layouts.master')

@section('title') Notes @endsection

@section('content')
    @include('layouts.includes.header')

    <div class="page-content">
        <!-- Start content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-check">
                                    <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th class="align-middle">Name</th>
                                        <th class="align-middle">Email</th>
                                        <th class="align-middle">notes</th>
                                        <th class="align-middle">Normal notes</th>
                                        <th class="align-middle">Urgent Notes</th>
                                        <th class="align-middle">Registration date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><span class="text-body fw-bold">{{$user->id}}</span></td>
                                        <td>{{$user->name ?? '-'}}</td>
                                        <td> {{$user->email ?? '-'}}</td>
                                        <td><a href="{{route('users.notes',$user->id)}}">{{$user->notes->count() ?? '-'}}</a></td>
                                        <td>{{$user->notes->where('type',0)->count() ?? '-'}}</td>
                                        <td>{{$user->notes->where('type',1)->count() ?? '-'}}</td>
                                        <td>{{$user->created_at->format('d/m/Y') ?? '-'}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
