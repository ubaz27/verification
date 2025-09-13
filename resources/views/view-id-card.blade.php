<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ID Card</title>
</head>

<body>
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">


    </div>

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div style="margin:15px 15px 15px" style="color:green">
                <h4 class="mb-3 mb-md-0">Welcome to Alumni ID Card Page</h4>
            </div>
            <div class="card-body">

                <h4 class="card-title">View ID Card Page</h4>
                <hr>
                {{-- <p class="text-muted mb-3">Read the <a href="https://jqueryvalidation.org/" target="_blank"> Official jQuery
                        Validation Documentation </a>for a full list of instructions and other options.</p> --}}

                @foreach ($data as $item)
                    <p>
                    <div>

                        <img style="width:100px;height:100px;border-radius:100px;" class="wd-30 ht-30 rounded-circle"
                            src="{{ url('img/passport/' . $item->passport) }}" alt="profile">

                    </div>
                    <b> <label>Name:</label></b> {{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}
                    <br>
                    <b> <label>Programme:</label></b> {{ $item->programme }}
                    <br>
                    <b> <label>Year:</label></b> {{ $item->year_graduation }}
                    </p>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
