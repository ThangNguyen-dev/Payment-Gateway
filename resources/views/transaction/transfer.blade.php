@extends('layouts.app')
@extends('layouts.nav')
@section('content')
    <div class="container py-5">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6">Transfer Money</h1>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info-->
                            <div id="credit-card" class="tab-pane fade show active pt-3">
                                <form action="{{route('transfermoney')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="user_id">
                                            <h6>User Phone Number</h6>
                                        </label>
                                        <input type="number" onblur="" id="number_phone"
                                               name="number_phone"
                                               placeholder="User Number Phone"
                                               required
                                               class="form-control ">
                                        <p style="opacity: 50%; font-weight: bolder" id="inforUser" class="ml-1"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="cardNumber">
                                            <h6>Price Transfer</h6>
                                        </label>
                                        <div class="input-group">
                                            <input type="number" id="price" name="price" placeholder="Price Transfer"
                                                   class="form-control " required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="username">
                                                    <h6>Description</h6>
                                                </label>
                                                <textarea size="4" type="text" name="description"
                                                          placeholder="Description"
                                                          required
                                                          class="form-control "></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" class="subscribe btn btn-primary btn-block shadow-sm"
                                               id="submit" value="Confirm Payment">
                                </form>
                            </div>
                        </div> <!-- End -->
                        <p class="text-muted">Note: After clicking on the button, you will be directed to a secure
                            gateway for payment. After completing the payment process, you will be redirected back
                            to
                            the website to view details of your order. </p>
                    </div> <!-- End -->
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            let number_phone = $("#number_phone");
            number_phone[0].addEventListener('blur', function () {
                getUser();
            })

            function getUser() {
                let _token = $("input[name='_token']").val();
                let number_phone = getNumberPhone();
                $("#inforUser").html("");
                $("#submit").addClass('disabled');
                $.ajax({
                    url: "{{ route('getter') }}",
                    type: 'POST',
                    data: {_token: _token, number_phone: number_phone},
                    success: function (data) {
                        console.log();
                        if (Object.values(data)[0] != null) {
                            $("#inforUser").html(Object.values(data)[0]);
                            $("#submit").removeClass('disabled');
                        }
                    }
                });
            }

            function getNumberPhone() {
                return $("#number_phone").val();
            };
        });
    </script>
@endsection
