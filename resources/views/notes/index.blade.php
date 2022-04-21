@extends('layouts.app')

@section('title')  Notes @endsection
@section('css')
    <link href="{{asset('css/rotating-card.css')}}" rel="stylesheet"/>

@endsection
@section('content')
    <div class="row">
        <h1 class="card-title mb-4 text-center"> Notes </h1>

        @include('layouts.includes.alerts.success')
        @include('layouts.includes.alerts.errors')
        @foreach($notes as $note)
            <div class="col-md-4">
                <div class="card mb-3">
                    <img class="card-img-top" src="{{$note->image ?? asset('assets/images/notes/default-placeholder.png')}}"
                         alt="Card image cap">
                    <div class="card-body">
                        <a href="{{route('users.show',$note->users->id)}}" class="card-title mb-2 "
                           style="font-size: 20px">{{$note->users->name}}</a>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text m-1">
                                    {{$note->created_at->diffForHumans()}}
                                </p>
                            </div>
                        </div>
                        <p class="card-text">{{$note->content}}</p>
                        <p>
                            @if($note->type == \App\Enums\NoteType::Normal->value)
                                <span class="badge bg-primary font-size-12">{{$note->type}}</span>
                            @elseif ($note->type == \App\Enums\NoteType::Urgent->value)
                                <span class="badge bg-danger font-size-12">{{$note->type}}</span>
                            @endif
                        </p>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-flex gap-3">
                                        <a href="{{route('users.notes',$note->users->id)}}" class="text-info"><i class="fa fa-share-alt"
                                                                                                                 style="font-size: 18px"></i></a>
                                    </div>
                                </div>
                                @auth
                                    @if ($note->user_id === auth()->id())
                                        <div class="col-md-4">
                                            <a href="{{route('notes.edit',$note->id)}}" class="text-primary"><i class="fa fa-pencil-alt"
                                                                                                                style="font-size: 18px ;margin-left: 15px; "></i></a>
                                            <a href="#" id="delete" data-id="{{$note->id}}" class="text-danger"><i class="fa fa-trash"
                                                                                                                   style="font-size: 18px;margin-left: 15px; "></i></a>
                                        </div>
                                    @endif
                                @endauth
                            </div>

                        </div>
                    </div>
                </div><!-- end card -->
            </div>

        @endforeach
    </div>
    {!! $notes->links() !!}

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js" defer></script>

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
