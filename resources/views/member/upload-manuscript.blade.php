@extends('member.layout.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-12 mb-md-0">Welcome to Application Page</h4>
        </div>

        <div class="col-lg-12 col-sm-12 col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Apply For Publication</h4>
                    <hr>
                    @if (Session::has('message'))
                        <div class="alert alert-primary" role="alert">
                            <ul>
                                {{ Session('message') }}
                                {{-- @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach --}}
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                {{ Session('error') }}
                                {{-- @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach --}}
                            </ul>
                        </div>
                    @endif
                    {{-- <p class="text-muted mb-3">Read the <a href="https://jqueryvalidation.org/" target="_blank"> Official jQuery
                            Validation Documentation </a>for a full list of instructions and other options.</p> --}}

                    {{-- {{ dd($applied) }} --}}

                    <form id="paymentForm" action="{{ route('member.uploadFile') }}" Method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <label for="ageSelect" class="form-label">Title</label> <span class="text-danger">(*)</span>
                                <select class="js-example-basic-single form-select" name="title_id" id="title_id">
                                    <option>---Select Title---</option>
                                    @foreach ($applied as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 ">
                                <label for="name" class="form-label">Manuscript</label> <span
                                    class="text-danger">(*)</span>
                                <input id="file" class="form-control" value="{{ old('filename') }}" name="filename"
                                    type="file" required>
                            </div>




                            {{-- <input type="text" id="pid" hidden class="form-control" value="" /> --}}





                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <input class="btn btn-primary" type="submit" value="Generate Invoice">

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>




    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Manuscript Track</h6>
                        <div class="dropdown mb-2">

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th class="pt-0">S/N</th>
                                    <th class="pt-0">Title</th>
                                    <th class="pt-0">File</th>
                                    <th class="pt-0">Reviewr's Status</th>
                                    <th class ="pt-0">Date Uploaded</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($files as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td><a href="{{ asset('manuscripts/' . $item->filename) }}">Download</a>
                                        </td>
                                        <td>{{ $item->reviewer_approve_status == 0 ? 'Not Approve' : 'Approve' }}</td>
                                        <td>{{ $item->created_at }}</td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div> <!-- row -->
@endsection


<script src="https://js.paystack.co/v1/inline.js"></script>
