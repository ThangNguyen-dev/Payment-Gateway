@extends('layouts.app')
@extends('layouts.nav')
@extends('layouts.footer')
@section('content')
    <div class="row mt-3">
        <div class="col-sm-6" style="margin: auto">
            <div class="card">
                <div class="card-header">
                    <strong>Credit Card</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('transfermoneyfrombank') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Username bank</label>
                                    <input class="form-control" name="username_bank" id="name" type="text"
                                           placeholder="Username bank">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Date active</label>
                                    <input class="form-control" name="date_active" id="" type="text"
                                           placeholder="Date active">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Money</label>
                                    <input class="form-control" id="name" name="money" type="number"
                                           placeholder="Money">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="ccnumber">Credit Card Number</label>
                                    <div class="input-group">
                                        <input class="form-control" name="credit_card" type="number"
                                               placeholder="0000 0000 0000 0000" autocomplete="email">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-credit-card"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="sel1">Select list bank:</label>
                                    <select class="form-control" id="bank" name="bank">
                                        <option value="Vietinbank">Vietinbank</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" style="width: 100%" class="btn btn-sm btn-success float-right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#submit").prop('disabled', true);
            let number_phone = $("#number_phone");
            number_phone[0].addEventListener('blur', function() {
                getUser();
            })

            function getUser() {
                let _token = $("input[name='_token']").val();
                let number_phone = getNumberPhone();

                $("#inforUser").html("").removeClass("alert alert-danger");
                $("#number_phone").removeClass("is-invalid")
                if (number_phone !== "") {
                    $.ajax({
                        url: "{{ route('getter') }}",
                        type: 'POST',
                        data: {
                            _token: _token,
                            number_phone: number_phone
                        },
                        success: function(data) {
                            if (Object.values(data)[0] != null) {
                                $("#submit").prop('disabled', false);
                                $("#inforUser").removeClass("alert alert-danger").html(Object.values(
                                    data)[0]);
                            }
                        },
                        error: function() {
                            $("#submit").prop('disabled', true);
                            $("#inforUser").html("Khong Tim Thay Thong Tin User").addClass(
                                "alert alert-danger");
                            $("#number_phone").addClass("is-invalid")
                        },
                    });
                }
            }

            function getNumberPhone() {
                return $("#number_phone").val();
            };
        });
    </script>
@endsection
