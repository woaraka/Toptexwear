@extends('include.app')
@section('titleApp', 'About us')
@section('content')
    <!-- Contact Start -->
    <div class="contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-info">
                        <h2>About Us</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque.
                        </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="contact-info">
                        <h2>Privacy Policy</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque.
                        </p>
                    </div>
                </div>
                <div class="col-lg-12" id="terms">
                    <div class="contact-info">
                        <h2>Terms & Condition</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function getResponse()
        {
            var _token = $('input[name="_token"]').val();
            var name = $("#txtName").val();
            var email = $("#txtEmail").val();
            var phone = $("#txtPhone").val();
            var reason = $("#txtSubject").val();
            var message = $("#txtMessage").val();
            if(name != "" && phone != ""  && reason != "" && message != "")
            {
                $.ajax({
                    type: "POST",
                    url: "{{ route('contact.store') }}",
                    data: {name: $("#txtName").val(), email: $("#txtEmail").val(), phone: $("#txtPhone").val(), reason: $("#txtSubject").val(),message: $("#txtMessage").val(), _token:_token},
                    success: function(data){
                        $("#succMessage").html(data);

                        $("#txtName").val("");
                        $("#txtEmail").val("");
                        $("#txtPhone").val("");
                        $("#txtSubject").val("");
                        $("#txtMessage").val("");
                    }
                });
            }
            else
                $("#succMessage").html('Please fill up your name, phone, valid email, subject and message.');
        }
    </script>
@endsection
@section('script')

@endsection
