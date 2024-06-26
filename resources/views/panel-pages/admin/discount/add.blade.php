@extends('layouts.adminMaster')
@section('panel-admin.content')

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body,h4 {
            font-family: Vazir !important;
        }

    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Breeze Admin</title>
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css" />
    <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
</head>
<body>

<div class="col-12 grid-margin stretch-card mt-5" style="height: 600px">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="card-title">افزودن تخفیف جدید</h4>

            <form class="forms-sample" action="{{ route('discount.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="name">نام</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>

                <div class="form-group">
                    <label for="code">کد تخفیف</label>
                    <input type="text" name="code" class="form-control" id="code">
                </div>

                <div class="form-group">
                    <label for="amount">مبلغ تخفیف</label>
                    <input type="text" name="amount" class="form-control" id="amount">
                </div>

                <div class="form-group">
                    <label for="expired_at">تاریخ انقضا</label>
                    <input type="date" min="{{ date("Y-m-d")}}" name="expired_at" class="form-control" id="expired_at">
                </div>


                <button type="submit" class="btn btn-primary mr-2"> افزودن </button>
            </form>

            <div><br>
                <a href="{{ route('discount.index') }}">نمایش تمام تخفیف ها</a>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
<script src="../../assets/vendors/select2/select2.min.js"></script>
<script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/hoverable-collapse.js"></script>
<script src="../../assets/js/misc.js"></script>
<script src="../../assets/js/file-upload.js"></script>
<script src="../../assets/js/typeahead.js"></script>
<script src="../../assets/js/select2.js"></script>
</body>
</html>

@endsection
