@include('layout.header2')
<!-- Navbar & Hero End -->


<!-- About Start -->
<div class="container-xxl py-5" id="about">
    <div class="container py-5 px-lg-5">
        <div class="row g-5 align-items-center">

            <h4 style="margin-top: 80px;" class="card-title">Editors' Information</h4>
            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Eidtors</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Information</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div></div>
                            <h6 class="card-title">Editors</h6>

                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>University</th>


                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php
                                        $i = 1;
                                        use App\Models\Editor;
                                         $editors = Editor::all();
                                    @endphp

                                    @foreach ($editors as $item)
                                        <tr>
                                            <td> {{ $i }} </td>
                                            <td> {{ $item->name }}</td>
                                            <td> {{ $item->university }}</td>





                                        </tr>
                                        {{-- {{  }} --}}
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- About End -->



<!-- Contact End -->

@include('layout.footer')
<!-- Footer Start -->

<?php
