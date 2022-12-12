@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Supplier</h4><br><br>

                        <form id="myForm" method="post" action="{{ route('supplier.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Code</label>
                                <div class="col-sm-10 form-group">
                                    <input name="code" class="form-control" type="number">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10 form-group">
                                    <input name="name" class="form-control" type="text">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Postal Code</label>
                                <div class="col-sm-10 form-group">
                                    <input name="postalCode" class="form-control" type="text">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Town</label>
                                <div class="col-sm-10 form-group">
                                    <input name="town" class="form-control" type="text">
                                </div>
                            </div>
                            <!-- end row -->
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Postal Code">
                        </form>



                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                code: {
                    required : true
                },
                postalCode: {
                    required : true,
                },
                name: {
                    required : true
                }
            },
            messages :{
                name: {
                    required : 'Please Enter a Code.',
                },
                postalCode: {
                    required : 'Please Enter a Postal Code.',
                },
                name: {
                    required : 'Please Enter a Name.',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    }); 
</script>

@endsection