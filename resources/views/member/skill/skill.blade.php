@extends('member.layout.master')
{{-- @extends('admin.asset.scripts') --}}


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Certificates and Skills Form</h4>
        </div>

    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Skills Details</h4>
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
                <form id="signupForm" action="{{ route('member.saveSkill') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="row">

                            <div class="col-md-8 ">
                                <label for="name" class="form-label">Skill</label> <span class = "text-danger">*</span>
                                <input id="kill" class="form-control" name="skill" value="" type="text">
                            </div>

                        </div>

                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Add" style="width:20%;">
                </form>
                <table class="table table-stripe" id="table_field" style="width: 99%;">
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Skill</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // dd($skills);
                        @endphp

                        @foreach ($skills as $skill)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $skill->skill }}</td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function() {



        });
    </script>
@endpush
