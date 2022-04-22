@extends('layouts.master')

@section('title') Notes @endsection

@section('content')
    @include('layouts.includes.alerts.success')
    @include('layouts.includes.alerts.errors')
    @include('layouts.includes.header')


    <div class="text-end">
        <button type="button"
                class="btn btn-primary btn-rounded waves-effect waves-light m-3 me-3"
                onclick="window.location.href='{{route('notes.create')}}'"><i
                class="mdi mdi-plus me-1"></i>Add Note
        </button>
    </div>
    <div class="page-content">
        <!-- Start content -->
        <div class="container-fluid">
            <div class="row">
                @foreach($notes as $note)
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="product-img position-relative">
                                    <div class="avatar-sm product-ribbon">
                                        @if($note->type == \App\Enums\NoteType::Normal->value)
                                            <span class="avatar-title rounded-circle  bg-primary">{{$note->type}}</span>
                                        @elseif ($note->type == \App\Enums\NoteType::Urgent->value)
                                            <span class="avatar-title rounded-circle  bg-danger ">{{$note->type}}</span>
                                        @endif
                                    </div>
                                    <img src="{{$note->image ?? asset('assets/images/notes/default-placeholder.png')}}" alt=""
                                         class="img-fluid mx-auto d-block">
                                </div>
                                <div class="mt-4 text-center">
                                    <a href="{{route('users.show',$note->users->id)}}" class="card-title mb-2 "
                                       style="font-size: 20px"><h5>{{$note->users->name}}</h5></a>
                                    <p class="text-muted mb-0">{!! \Illuminate\Support\Str::limit($note->content, 160, '...') !!}</p>
                                    <h5 class="mt-2"><span class="text-muted me-2 ">{{$note->created_at->diffForHumans()}}</span></h5>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-top text-center">
                                <div class="d-flex mb-0 team-social-links" id="tooltip-container5">
                                    <div class="flex-fill">
                                        <a href="{{route('users.notes',$note->users->id)}}" class="text-info"><i class="fa fa-share-alt"
                                                                                                                 style="font-size: 16px"></i></a>
                                    </div>
                                    @auth
                                        @if ($note->user_id === auth()->id())
                                            <div class="flex-fill">
                                                <a href="{{route('notes.edit',$note->id)}}" class="text-primary"><i
                                                        class="fa fa-pencil-alt"
                                                        style="font-size: 16px ; "></i></a>

                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" id="delete" data-id="{{$note->id}}" class="text-danger"><i
                                                        class="fa fa-trash"
                                                        style="font-size: 16px; "></i></a>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            {!! $notes->links() !!}
        </div>
    </div>



@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js" defer></script>
@endsection
@section('script-bottom')
    <script>
        $(document).on('click', '#delete', function () {
            var id = $(this).attr('data-id');
            var token = $('meta[name="csrf-token"]').attr('content')
            var dialog = bootbox.confirm({
                message: "Are you sure want to delete?",
                callback: function (result) {
                    console.log(result);
                    if (result === false) {
                        dialog.modal('hide');
                    } else {
                        $.ajax({
                            type: 'DELETE',
                            url: '{{url('/destroy/')}}' + "/" + id,
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function () {
                                bootbox.alert({
                                    message: "has been sent successfully ",
                                    className: 'bb-alternate-modal'
                                });
                                setTimeout(function () {
                                    location.reload();
                                }, 2000)
                            }
                        });
                    }

                }
            });
        });
    </script>
@endsection
