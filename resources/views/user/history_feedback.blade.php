<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="short icon" href="{{asset('images/icon-title.ico')}}">
    <title>My Account</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<style>
    body {
        margin-top: 20px;
        color: #1a202c;
        text-align: left;
        background-color: #e2e8f0;
    }

    .main-body {
        padding: 15px;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm > .col, .gutters-sm > [class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3, .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }

    .card-body {
        height: 54vh;
    }
</style>
<body>
<div class="container">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <div class="container-fluid" style="float:left; ">
                <div class="row">
                    <div class="col-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" style="line-height: 4vh;"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active dropdown" aria-current="page" >
                                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" id="button">History Feedback</button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/user/my_account" class="dropdown-item">
                                            My Information
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                    <div class="col-7 breadcrumb">&nbsp;</div>
                    <div class="col-1 breadcrumb">
                        <a href="/logout" class="navbar-text">Logout</a>
                    </div>
                </div>

            </div>

        </nav>
        <!-- /Breadcrumb -->
        @if (session()->has('message'))
            <div class="alert alert-success text-center" role="alert">{{ session('message') }}</div>
        @elseif(session()->has('old'))
            <div class="alert alert-danger" role="alert">{{ session('old') }}</div>
        @elseif(session()->has('accept'))
            <div class="alert alert-danger" role="alert">{{ session('accept') }}</div>

        @elseif(session()->has('same'))
            <div class="alert alert-danger" role="alert">{{ session('same') }}</div>

        @endif
        <div class="row gutters-sm">
            <h3>History Feedback</h3>
            <table class="table" style="border-radius: 13px; text-align: center;">
                <tr>
                <th scope="col" style="border: 1px solid #000000">Image</th>
                    <th scope="col" style="border: 1px solid #000000">Product</th>
                    <th scope="col" style="border: 1px solid #000000">User</th>
                    <th scope="col" style="border: 1px solid #000000">Feedback</th>
                    <th scope="col" style="border: 1px solid #000000">Day Feedback</th>
                </tr>
                @foreach ($data_feedback as $data)
                    <tr>
                            <td style="border: 1px solid #000000">
                                <img src="{{$data->value}}" alt="" style="width: 6vw">
                            </td>
                        <td style="border: 1px solid #000000">
                            {{$data->name_product}}
                        </td>
                        <td style="border: 1px solid #000000">
                            {{$data->username}}
                        </td>
                        <td style="border: 1px solid #000000">
                            {{$data->comment}}
                        </td>
                        <td style="border: 1px solid #000000">
                        {{date('M d,Y h:i A',strtotime($data->date_to))}}
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$data_feedback->links()}}
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/1fa6a2ee32.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    document.getElementById('fileImg').onchange = evt => {
        const [file] = fileImg.files;
        if (file) {
            img.src = URL.createObjectURL(file);
        }

    }
</script>
</body>
</html>
