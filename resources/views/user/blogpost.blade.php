<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.homecss')
    <!-- Include your custom CSS -->
    <style>
        h4 {
            color: black;
            text-align: center;
            font-size: 25px !important;
        }

        .img-div {
            margin: 10px;
            border-radius: 10px;
        }

        p {
            text-align: center;
        }

        .col-md-4 {
            background-color: white;
            margin: 5px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="header_section">
        @include('user.header')
        <!-- Include your header content -->

        <div class="services_section layout_padding">
            <div class="container">
                <h1 class="services_taital">Blog Post</h1>
                <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the
                    majority have suffered alteration</p>
                <div class="services_section_2">
                    <div class="row justify-content-center">
                        <!-- Center align columns -->
                        @foreach ($post as $singlePost)
                        <div class="col-md-4">
                            <div class="img-div"><img src="/postimage/{{$singlePost->image}}" class="post_image"></div>
                            <h4>{{$singlePost->title}}</h4>
                            <p>{{$singlePost->name}}</p>
                            <div class="btn_main"><a href="{{ route('post_details', $singlePost->id) }}">Read More</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('user.footer')
        <!-- Include your footer content -->
    </div>
</body>

</html>