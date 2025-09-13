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
                    {{-- @if (blank(@$applied)) --}}
                    <form id="paymentForm" action="{{ route('member.saveApply') }}" Method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ageSelect" class="form-label">Publication Batch</label> <span
                                    class="text-danger">(*)</span>
                                <select class="js-example-basic-single form-select" name="batch_id" id="batch_id">

                                    @foreach ($batch as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->publication }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8 ">
                                <label for="name" class="form-label">Title</label> <span class="text-danger">(*)</span>
                                <input id="title" class="form-control" value="{{ old('title') }}" name="title"
                                    type="text" required>
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
                    {{-- @else
                        @foreach ($applied as $item)
                            <b>Title:</b> {{ $item->title }}
                        @endforeach
                    @endif --}}
                </div>
            </div>
        </div>

    </div>




    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Application Track</h6>
                        <div class="dropdown mb-2">

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th class="pt-0">S/N</th>
                                    <th class="pt-0">Batch</th>
                                    <th class="pt-0">Title</th>
                                    <th class="pt-0">Closing Date</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($track as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->publication }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->closing_date }}</td>


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
