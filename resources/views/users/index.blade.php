@extends('layouts.master')

@section('title') Notes @endsection



@section('content')
    @include('layouts.includes.alerts.success')
    @include('layouts.includes.alerts.errors')
    @include('layouts.includes.header')
    <div class="page-content">
        <!-- Start content -->
        <div class="container-fluid">
            <div class="row">
                @foreach ($users as $user)
                    <div class="col-xl-4 col-sm-6">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="font-size-15 mb-1"><a href="{{route('users.notes',$user->id)}}" class="text-dark">{{$user->name ?? '-'}}</a>
                                </h5>
                                <p class="text-muted"> {{$user->email}}</p>

                                <div>
                                    <a href="{{route('users.notes',$user->id)}}" class="badge bg-primary m-1">Note  ({{$user->notes->count() ?? '-'}})</a>
                                    <a href="javascript: void(0);" class="badge bg-secondary  m-1">Note Normal  ({{$user->notes->where('type',\App\Enums\NoteType::Normal->value)->count() ?? '-'}})</a>
                                    <a href="javascript: void(0);" class="badge bg-danger m-1">Note Urgent ({{$user->notes->where('type',\App\Enums\NoteType::Urgent->value)->count() ?? '-'}})</a>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-top">
                               <p> {{$user->created_at->format('d/m/Y') ?? '-'}} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{$users->links()}}

            </div>
        </div>
    </div>
@endsection
