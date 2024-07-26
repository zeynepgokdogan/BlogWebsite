<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.homecss')

    <style>
        p {
            color: #937CCB;
            text-align: center;
            font-family: 'Righteous', sans-serif;
            font-style: normal;
            font-weight: 700;
            font-size: 30px;
            line-height: normal;
            margin-top: 70px !important;
        }

        body {
            background-color: #111;
            color: white;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
        }

        .form-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.9);
        }

        .div_center {
            display: flex;
            justify-content: center;
            /* Center horizontally */
            padding: 15px;
        }

        label {
            font-weight: bold;
            display: inline-block;
            width: 200px;
            text-align: right;
            margin-right: 10px;
            color: black;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            /* Ensure border is light grey */
            width: 300px;
            background-color: #c6c2ff;
            color: black;
            margin-left: 10px;
        }

        textarea {
            height: 100px;
            resize: vertical;
            background-color: #c6c2ff !important;
            color: black !important;
            border-radius: 10px !important;
            border: 1px solid #ccc !important;
            /* Ensure the border is light grey */
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #937CCB;
            color: white;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            text-align: center;
            display: inline-block;
            /* Ensure the button takes only the necessary width */
        }

        .btn:hover {
            background-color: #2b2278;
        }


        .alert {
            background-color: #937CCB;
            /* Buton rengi */
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert .close {
            color: white;
            opacity: 0.7;
            font-size: 20px;
            cursor: pointer;
        }

        .alert .close:hover {
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="header_section">
        @include('user.header')

        <div class="page-content">

            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
            @endif

            <p>ADD YOUR BLOG</p>
            <div class="form-container">
                <form action="{{ route('user_post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">
                        <label>Post Title</label>
                        <input type="text" name="title">
                    </div>
                    <div class="div_center">
                        <label>Post Description</label>
                        <textarea name="description"></textarea>
                    </div>
                    <div class="div_center">
                        <label>Add Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="div_center">
                        <button type="submit" class="btn">Upload</button>
                    </div>
                </form>
            </div>
        </div>
        @include('user.footer')
    </div>
</body>

</html>