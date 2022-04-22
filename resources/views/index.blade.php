@extends('layouts.master')

@section('title') Notes @endsection

@section('content')
    <!-- hero section start -->
    @include('layouts.includes.alerts.success')
    @include('layouts.includes.alerts.errors')

    <!-- currency price section start -->
    @include('layouts.includes.header')
    <!-- currency price section end -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Notes</div>
                        <h4>Our Notes</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->
                <div class="text-end">
                        <button type="button"
                                class="btn btn-primary btn-rounded waves-effect waves-light mb-2 me-2"
                                onclick="window.location.href='{{route('notes.create')}}'"><i
                                class="mdi mdi-plus me-1"></i>Add Note
                        </button>
            </div>

            <div class="col-lg-12">

                <div class="owl-carousel owl-theme events navs-carousel" id="team-carousel" dir="ltr">

                    @foreach($notes as $note)

                        <div class="item">
                            <div class="card text-center team-box">
                                <div class="card-body">
                                    <div>
                                        <img src="{{$note->image ?? asset('assets/images/notes/default-placeholder.png')}}" alt=""
                                             class="rounded">
                                    </div>

                                    <div class="mt-3">
                                        <a href="{{route('users.show',$note->users->id)}}" class="card-title mb-2 "
                                           style="font-size: 20px"><h5>{{$note->users->name}}</h5></a>

                                        <p>
                                            @if($note->type == \App\Enums\NoteType::Normal->value)
                                                <span class="badge bg-primary font-size-12">{{$note->type}}</span>
                                            @elseif ($note->type == \App\Enums\NoteType::Urgent->value)
                                                <span class="badge bg-danger font-size-12">{{$note->type}}</span>
                                            @endif
                                        </p>
                                        <p class="card-text m-1">{{$note->created_at->diffForHumans()}}</p>

                                        <P class="text-muted mb-0">
                                            {!! \Illuminate\Support\Str::limit($note->content, 160, '...') !!}</P>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-top">
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
            </div>
        <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->

@endsection

@section('script')
    <script src="{{ URL::asset('assets/libs/chart-js/chart-js.min.js') }}"></script>
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
                            url: '{{url('/notes/destroy/')}}' + "/" + id,
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




