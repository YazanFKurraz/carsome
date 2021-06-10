<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel, jquery ajax categories and subcategories, select dropdown</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>
<body>
<div class="container" style="margin-top: 50px; margin-left: 300px">
    <div class="row">
        <div class="col-lg-6">
            <form action="">
                <h4>Category</h4>
                <select class="browser-default custom-select" name="brand_id" id="brand">
                    <option selected>Select brand</option>
                    @foreach ($brands as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <h4>Subbrand</h4>
                <select class="browser-default custom-select" name="model_id" id="model">
                </select>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $('#brand').on('change', function (e) {
            var brand_id = e.target.value;
            $.ajax({
                url: "{{ route('admin.car.model.ajax') }}",
                type: "POST",
                data: {
                    brand_id: brand_id
                },
                success: function (data) {
                    $('#model').empty();
                    $.each(data.models_car, function (index, model) {
                        $('#model').append('<option value="' + model.id + '">' + model.name + '</option>');
                    })
                }
            })
        });
    });
</script>
</body>
</html>
