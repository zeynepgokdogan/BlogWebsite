<!DOCTYPE html>
<html>

<head>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .title-deg {
            font-size: 30px;
            font-weight: bold;
            color: #864dd9;
            padding: 30px;
            text-align: center;
            margin: 50px 0;
        }

        .table-container {
            display: flex;
            justify-content: center;
            width: 100%;
            overflow-x: auto;
            /* Mobil uyumluluk için yatay kaydırma */
        }

        .table-deg {
            border: 1px solid #864dd9;
            /* Tablo çerçevesi rengi */
            width: 80%;
            text-align: center;
            border-collapse: separate;
            border-spacing: 0 10px;
            margin: 0 auto;
            /* Tabloyu ortalamak için */
        }

        .th-deg,
        .td-deg {
            border-bottom: 2px solid #864dd9;
            /* Th ve td alt çizgisi rengi */
            padding: 10px 20px;
        }

        .th-deg {
            color: #864dd9;
            font-size: 25px;
        }

        .img-container {
            height: 150px;
            width: 100%;
            max-width: 350px;
            padding: 20px;
            overflow: hidden;
        }

        .img-deg {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .btn-custom {
            background-color: #864dd9;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            text-align: center;
        }

        .btn-custom:hover {
            background-color: #6825ce !important;
            color: white !important;
        }

        .alert-custom {
            background-color: #937CCB;
            /* Buton rengi */
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

        @media (max-width: 768px) {

            .th-deg,
            .td-deg {
                font-size: 18px;
                padding: 5px 10px;
            }

            .table-deg {
                width: 100%;
            }
        }

        @media (max-width: 480px) {

            .th-deg,
            .td-deg {
                font-size: 14px;
                padding: 5px;
            }

            .img-container {
                height: 100px;
                width: 100%;
                max-width: 250px;
            }

            .title-deg {
                font-size: 24px;
                padding: 20px;
            }

            .table-deg,
            .th-deg,
            .td-deg {
                display: block;
                width: 100%;
            }

            .td-deg {
                text-align: right;
                position: relative;
                padding-left: 50%;
                white-space: pre-wrap;
                text-align: left;
            }

            .td-deg::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: calc(50% - 10px);
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }
    </style>
    @include('admin.homecss')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')

        <div class="page-content">
            @if(session()->has('message'))
            <div class="alert alert-custom">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
            @endif

            <h1 class="title-deg">ALL POST</h1>
            <div class="table-container">
                <table class="table-deg">
                    <tr class="th-deg">
                        <th class="th-deg">Post Title</th>
                        <th class="th-deg">Description</th>
                        <th class="th-deg">Post By</th>
                        <th class="th-deg">Post Status</th>
                        <th class="th-deg">User Type</th>
                        <th class="th-deg">Image</th>
                        <th class="th-deg">Delete</th>
                        <th class="th-deg">Edit</th>
                    </tr>
                    @foreach ($post as $post)
                    <tr>
                        <td class="td-deg" data-label="Post Title">{{ $post->title }}</td>
                        <td class="td-deg" data-label="Description">{{
                            \Illuminate\Support\Str::limit($post->description, 50, $end='...') }}</td>
                        <!-- Description kısaltması -->
                        <td class="td-deg" data-label="Post By">{{ $post->name }}</td>
                        <td class="td-deg" data-label="Post Status">{{ $post->post_status }}</td>
                        <td class="td-deg" data-label="User Type">{{ $post->usertype }}</td>
                        <td class="td-deg" data-label="Image">
                            <div class="img-container">
                                <img class="img-deg" src="{{ asset('postimage/'.$post->image) }}" alt="Post Image">
                            </div>
                        </td>
                        <td class="td-deg" data-label="Delete">
                            <a href="{{ url('delete_post', $post->id) }}" class="btn btn-danger"
                                onclick="return confirmation(event)">Delete</a>
                        </td>
                        <td class="td-deg" data-label="Edit">
                            <a href="{{ url('edit_post', $post->id) }}" class="btn-custom">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        @include('admin.footer')
    </div>

    <script type="text/javascript">
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            Swal.fire({
                title: "Are you sure to delete this post?",
                text: "You won't be able to revert this delete",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#dc3545', // Match the main screen "Delete" button color
                cancelButtonColor: '#864dd9', // Match the main screen "Edit" button color
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
</body>

</html>
