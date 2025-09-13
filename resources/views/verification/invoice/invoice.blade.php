@extends('member.layout.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-12 mb-md-0">Welcome to Payment Report Summary</h4>
        </div>

        <div class="col-lg-12 col-sm-12 col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Generate ID Card Invoice</h4>
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

                    @if (!blank(@$message))
                        <div class="alert alert-danger" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    @if (blank(@$payments))
                        {{-- <p class="text-muted mb-3">Read the <a href="https://jqueryvalidation.org/" target="_blank"> Official jQuery
                            Validation Documentation </a>for a full list of instructions and other options.</p> --}}
                        <form id="paymentForm" action="{{ route('member.generateInvoice') }}" Method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-2 ">
                                    {{-- <label for="name" class="form-label">Phone No</label> <span --}}
                                    {{-- class="text-danger">(*)</span> --}}
                                    <input id="regno" class="form-control" value="{{ $member_details->regno }}"
                                        name="regno" type="text" required readonly hidden>
                                </div>


                                <div class="col-md-2 ">
                                    {{-- <label for="name" class="form-label">First Name</label> <span class = "text-danger">*</span> --}}
                                    <input id="first_name" class="form-control" name="first_name"
                                        value="{{ $member_details->first_name }}" type="text" readonly hidden>
                                </div>
                                <div class="col-md-2 ">
                                    {{-- <label for="name" class="form-label">Middle Name</label> <span
                                        class = "text-danger">*</span> --}}
                                    <input id="middle_name" class="form-control" name="middle_name"
                                        value="{{ $member_details->middle_name }}" type="text" readonly hidden>
                                </div>
                                <div class="col-md-2 ">
                                    {{-- <label for="name" class="form-label">Last Name</label> <span
                                        class = "text-danger">*</span> --}}
                                    <input id="last_name" class="form-control" name="last_name"
                                        value="{{ $member_details->last_name }}" type="text" readonly hidden>
                                </div>
                                <div class="col-md-4">
                                    {{-- <label for="email" class="form-label">Email</label> <span
                                        class = "text-danger">*</span> --}}
                                    <input id="email" class="form-control" name="email" type="email" readonly
                                        value="{{ $member_details->email }}" required placeholder="Valid Email" hidden>
                                </div>

                                <input type="text" id="pid" hidden class="form-control"
                                    value="{{ $id }}" />

                                <div class="col-md-4">
                                    {{-- <label for="email" class="form-label">Amount</label> <span
                                        class = "text-danger">*</span> --}}
                                    {{-- @foreach ($form_information as $item) --}}
                                    <input id="amount" class="form-control" name="amount" type="number"
                                        value="{{ '5000' }}" required placeholder="Amount" readonly hidden>
                                    {{-- <span style="color:red;font-size:14px;">Admin Charges Applied</span> --}}
                                    {{-- @endforeach --}}
                                </div>
                            </div>
                            <br>
                            <div class="row">

                                <div class="col-sm-12">
                                    <input class="btn btn-primary col-sm-12" type="submit" value="Generate Invoice">

                                </div>


                            </div>
                        </form>
                    @else
                        @foreach ($accounts as $item)
                            @php
                                $account_name = $item->account_name;
                                $account_no = $item->account_no;
                                $bank_name = $item->bank_name;
                            @endphp
                        @endforeach
                        <div>
                            Bank Name: <b> <span style="color:black;">{{ $bank_name }}</span><br></b>
                            Account Name: <b> <span style="color:black;">{{ $account_name }}</span><br></b>
                            Account Number: <b><span style="color:black;">{{ $account_no }}</span></b>
                            <p>
                                Use the following information in below box as a remark during the payment: <br>
                            <div style="border:solid;">
                                {{-- @foreach ($member_details as $item) --}}
                                {{ $member_details->regno }} ; {{ $member_details->first_name }}
                                {{ $member_details->middle_name }}
                                {{ $member_details->last_name }}
                                {{-- @endforeach --}}

                            </div>
                            <br>
                            </p>
                            Note:
                            <ul>
                                <li>Ensure you use your <b><i>phone number, Fullname and program name</i></b> as your
                                    remarks during
                                    payment.</li>
                                <li> Send the payment evidence to <b><i>bukaa@bukalumni.com.ng</i></b>. Payment will be
                                    process after 24
                                    hours.</li>
                            </ul>

                        </div>
                        @foreach ($payments as $item)
                            @php

                                if ($item->payment_status_code == 0 || $item->payment_status_code == 01) {
                                    $payment_status = 'Paid';
                                    $status = 'disabled';
                                } else {
                                    $payment_status = 'Pending';
                                    $status = '';
                                }

                            @endphp
                            {{-- Receipt --}}
                            @if ($payment_status == 'Paid')
                                <form id="Receipt" action="{{ route('member.donwloadReceipt') }}" Method="POST"
                                    target="_blank">
                                    @foreach ($payments as $item)
                                        <div class="col-md-4">
                                            <input type="number" value="{{ $item->payment_id }}" name="payment_id" hidden>
                                        </div>
                                    @endforeach
                                    <div class="col-sm-12">
                                        <input class="btn btn-primary col-sm-12" type="submit" value="Generate Receipt">

                                    </div>
                                </form>
                            @else
                                {{-- invoice download --}}
                                <form id="invoice" action="{{ route('member.downloadInvoice') }}" Method="POST"
                                    target="_blank">
                                    @foreach ($payments as $item)
                                        <div class="col-md-4">
                                            <input type="number" value="{{ $item->payment_id }}" name="payment_id" hidden>
                                        </div>
                                    @endforeach
                                    <div class="col-sm-12">
                                        <input class="btn btn-info col-sm-12" type="submit" value="Generate Invoice">

                                    </div>
                                </form>
                            @endif
                        @endforeach
                    @endif

                </div>
            </div>
        </div>

    </div>




    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Invoice Track</h6>
                        <div class="dropdown mb-2">
                            Payment include administrative charges when paying online
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th class="pt-0">S/N</th>
                                    <th class="pt-0">Date</th>

                                    <th class="pt-0">Paymenet Reference</th>
                                    <th class="pt-0">Amount to Pay</th>
                                    <th class="pt-0">Payment Status</th>
                                    <th class="pt-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($allpayment as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->date_processed }}</td>

                                        <td>{{ $item->payment_reference }}</td>
                                        <td>N {{ number_format($item->amount_paid, 2) }}</td>
                                        {{-- <td>N {{ number_format($item->amount, 2) }}</td> --}}
                                        <td>
                                            @if ($item->payment_status_code == 25)
                                                <span>Not Paid</span>
                                            @else
                                                <span>Paid</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->payment_status_code == '25')
                                                <form action="{{ route('member.makePayment') }}" method = 'POST'>
                                                    <input type="text" hidden class="form-control"
                                                        value ="{{ $item->payment_id }}" name="payment_id">
                                                    <input type="submit" class="btn btn-success btn-sm" name="pay"
                                                        value="Pay">
                                                </form>
                                            @elseif($item->generated == '0')
                                                <span>Not Printed</span>
                                            @else
                                                <span>Printed</span>
                                            @endif


                                        </td>

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

<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
        e.preventDefault();
        let handler = PaystackPop.setup({
            // key: 'pk_live_ab15aef639b70a3bc1da3409137e57df1647710e', // Replace with your public key
            // key: 'pk_test_66bc779ffdb59710487eb329205f2ffdf9546395', // Replace with your public key
            key: 'pk_test_0617731a8655972d2ae1b8cc06e180ffb78a2702', // Replace with your public key
            email: document.getElementById("email").value,
            lastname: document.getElementById("last_name").value,
            firstname: document.getElementById("first_name").value,

            amount: document.getElementById("amount").value * 100,


            gsm: document.getElementById("phone").value,
            pid: document.getElementById("pid").value,
            ref: document.getElementById("reference")
                .value, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function() {
                alert('Window closed.');
            },
            callback: function(response) {
                let message = 'Payment complete! Reference: ' + response.reference;
                // alert(message);
                window.location = "./online_reg_ref.php?reference=" + response.reference;
            }
        });
        handler.openIframe();
    }
</script>
