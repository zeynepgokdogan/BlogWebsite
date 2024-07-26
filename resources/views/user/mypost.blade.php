<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.homecss')
    <!-- Include your custom CSS -->
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
    </style>
</head>

<body>
    <div class="header_section">
        @include('user.header')
        <!-- Include your header content -->

        <div class="services_section layout_padding">
            <div class="container">
                <p> MY BLOGS</p>
                <div class="services_section_2">
                    <div class="row justify-content-center">
                        <!-- Center align columns -->
                        @foreach ($data as $mydata)
                        <div class="col-md-4">
                            <div class="img-div"><img src="/postimage/{{$mydata->image}}" class="post_image"></div>
                            <h4>{{$mydata->title}}</h4>
                            <h5>{{$mydata->name}}</h5>
                            <div class="btn_main"><a href="{{ route('post_details', $mydata->id) }}">Read More</a>
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