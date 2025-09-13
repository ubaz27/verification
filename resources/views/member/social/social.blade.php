@extends('member.layout.master')
{{-- @extends('admin.asset.scripts') --}}


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Social Page Form</h4>
        </div>

    </div>

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Social Details</h4>
                <hr>
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            {{ Session('error') }}
                        </ul>
                    </div>
                @endif
                @if (Session::has('message'))
                    <div class="alert alert-primary" role="alert">
                        <ul>
                            {{ Session('message') }}
                        </ul>
                    </div>
                @endif
                {{-- <p class="text-muted mb-3">Read the <a href="https://jqueryvalidation.org/" target="_blank"> Official jQuery
                        Validation Documentation </a>for a full list of instructions and other options.</p> --}}
                <form id="signupForm" action="{{ route('member.saveSocial') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Facebook</label>
                            <input id="facebook" class="form-control" placeholder="Facebook link" name="facebook"
                                value="{{ $facebook }}" type="text">
                        </div>
                        <div class="col-md-12">
                            <label for="name" class="form-label">X (Formally Twitter)</label>
                            <input id="twitter" class="form-control" placeholder="Twitter Link" name="twitter"
                                value="{{ $twitter }}" type="text">
                        </div>
                        <div class="col-md-12">
                            <label for="name" class="form-label">LinkedIn</label>
                            <input id="linkedin" class="form-control" placeholder="LinkedIn link" name="linkedin"
                                value="{{ $linkedin }}" type="text">
                        </div>
                        <div class="col-md-12">
                            <label for="name" class="form-label">Youtube</label>
                            <input id="youtube" class="form-control" Placeholder="Youtube channel" name="youtube"
                                value="{{ $youtube }}" type="text">
                        </div>
                        <div class="col-md-12">
                            <label for="name" class="form-label">Instagram</label>
                            <input id="instagram" class="form-control" placeholder="Instagram link" name="instagram"
                                value="{{ $instagram }}" type="text">
                        </div>

                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Save" style="width:30%;">
                </form>

            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {


            $("#nationality").change(function() {
                $("#lga").empty();
                $("#state").empty();
                var nationality = $("#nationality").val();
                // alert(nationality);
                $.ajax({
                    method: 'POST',
                    url: "{{ route('member.fetchState') }}",
                    data: {
                        'nationality': nationality,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {

                        $('#state').append(
                            '<option value="">-- Select State--</option>');
                        response.state.forEach(state =>
                            $('#state').append("<option>" + state.state + "</option>")
                        )
                    },
                    error: function(jqXHR, textStatus,
                        errorThrown) {
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' +
                            errorThrown);
                    }
                });
            });



        });
    </script>
@endpush
