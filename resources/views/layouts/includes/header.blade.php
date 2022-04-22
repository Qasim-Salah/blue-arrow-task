<section class="section hero-section bg-ico-hero" id="home">
    <div class="bg-overlay bg-primary"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="text-white-50">
                    <h1 class="text-white fw-semibold mb-3 hero-title">Blue Arrow</h1>
                    <p class="font-size-14">Discover best properties in one place
                    </p>
                </div>
            </div>

        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<section class="section p-0">
    <div class="container">
        <div class="currency-price">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-warning bg-soft text-warning font-size-18">
                                                <i class="mdi mdi-note"></i>
                                            </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted">Notes</p>
                                    <h5>{{\App\Models\Note::count()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                <i class="mdi mdi-note"></i>
                                            </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted">Notes Normal</p>
                                    <h5>{{\App\Models\Note::where('type',\App\Enums\NoteType::Normal->value)->count()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-info bg-soft text-info font-size-18">
                                                <i class="mdi mdi-note"></i>
                                            </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted">Notes Urgent</p>
                                    <h5>{{\App\Models\Note::where('type',\App\Enums\NoteType::Urgent->value)->count()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end container -->
</section>
