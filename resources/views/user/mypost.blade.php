<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.homecss')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        p {
            color: #937CCB;
            text-align: center;
            font-family: 'Righteous', sans-serif;
            font-style: normal;
            font-weight: 700;
            font-size: 30px;
            line-height: normal;
        }

        h4 {
            color: black;
            text-align: center;
            font-size: 25px !important;
        }

        .img-div {
            margin: 10px;
            border-radius: 10px;
        }

        h5 {
            text-align: center;
            font-size: 15px !important;
        }

        .col-md-4 {
            background-color: white;
            margin: 5px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
            transition: box-shadow 0.3s ease-in-out;
        }

        .col-md-4:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .alert-custom {
            background-color: #937CCB;
            color: black;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert-custom .close {
            color: white;
            opacity: 0.7;
            font-size: 20px;
            cursor: pointer;
        }

        .alert-custom .close:hover {
            opacity: 1;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 10px; /* Space between buttons */
            margin-top: 10px;
        }

        .btn {
            display: inline-block;
            max-width: 150px;
            padding: 8px 15px;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            text-decoration: none;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger a {
            color: white;
        }

        .btn-danger a:hover {
            background-color: #c82333;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary a {
            color: white;
        }

        .btn-primary a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="header_section">
        @include('user.header')
        @if(session()->has('message'))
        <div class="alert alert-custom">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="services_section layout_padding">
            <div class="container">
                <p>MY BLOGS</p>
                <div class="services_section_2">
                    <div class="row justify-content-center">
                        @foreach ($data as $mydata)
                        <div class="col-md-4">
                            <div class="img-div"><img src="/postimage/{{$mydata->image}}" class="post_image"></div>
                            <h4>{{$mydata->title}}</h4>
                            <h5>{{$mydata->name}}</h5>
                            <div class="btn_main"><a href="{{ route('post_details', $mydata->id) }}">Read More</a></div>
                            <div class="btn-container">
                                <div class="btn btn-primary small-btn">
                                    <a href="{{ route('mypost_edit', $mydata->id) }}">Edit</a>
                                </div>
                                <div class="btn btn-danger small-btn">
                                    <a onclick="return confirmation(event)"
                                        href="{{ route('mypost_delete', $mydata->id) }}">Delete</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('user.footer')
        <script type="text/javascript">
            function confirmation(ev) {
                ev.preventDefault();
                var urlToRedirect = ev.currentTarget.getAttribute('href');
                Swal.fire({
                    title: "Are you sure to delete this post?",
                    text: "You won't be able to revert this delete",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#864dd9',
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = urlToRedirect;
                    }
                });
                return false; // Prevent the default anchor action
            }
        </script>
    </div>
</body>

</html>
