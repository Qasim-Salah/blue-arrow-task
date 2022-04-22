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
                <form id="form" action="{{route('notes.update',$note->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card-deck-wrapper">
                                <div class="card-group">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Edit Note</h4>
                                            <div class="m-3">
                                                <img class="img-fluid mb-3 d-block" style="height: 200px; width: 300px;"
                                                     src="{{ $note->image ??  asset('assets/images/notes/default-placeholder.png')}}">
                                            </div>
                                            <div class="row ">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Note Picture </label>
                                                    <input type="file" name="image"
                                                           class="filestyle  "
                                                           data-btnClass="btn-primary" data-text="Choose Picture"
                                                           data-placeholder="Picture Not Found"
                                                           value="{{old('image',$note->image)}}"
                                                    >
                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="control-label mb-2">Note type</label>
                                                    <select name="type"
                                                            class="form-control ">
                                                        <option disabled selected>Choose the type of note</option>
                                                        @foreach(\App\Enums\NoteType::cases() as $value)
                                                            <option
                                                                value="{{$value->value}}" {{old('type',$note->type) == $value->value ? 'selected' :''}} >{{$value->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    </select>
                                                    @error('type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label mt-3">Notes</label>
                                                    <textarea id="textarea" class="form-control" name="content" rows="6"
                                                              placeholder="Enter notes">{{old('name',$note->content)}}</textarea>
                                                </div>
                                                <div>
                                                    <button type="submit" name="submit" value="save" class="btn btn-primary w-md"><i
                                                            class="fa fa-save"></i> Update
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
