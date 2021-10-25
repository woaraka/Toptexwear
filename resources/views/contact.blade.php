@extends('include.app')
@section('titleApp', 'Contact')
@section('content')
    <!-- Contact Start -->
    <div class="contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h2>Our Office</h2><br><br><br>
                        <h3><i class="fa fa-map-marker"></i>Dhaka-Chittagong Highway 5/5<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rayerbag, Dhaka-1362</h3>
                        <h3><i class="fa fa-envelope"></i>toptexwear@gmail.com</h3>
                        <h3><i class="fa fa-phone"></i>+880 1979 788790-2</h3>
                        <!--
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>-->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h2>Our Store</h2><br><br><br>
                        <h3><i class="fa fa-map-marker"></i>Dhaka-Chittagong Highway 5/5<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rayerbag, Dhaka-1362</h3>
                        <h3><i class="fa fa-envelope"></i>toptexwear@gmail.com</h3>
                        <h3><i class="fa fa-phone"></i>+880 1979 788790-2</h3>
                        <!--
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>-->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-form">
                        <!-- IF MAIL SENT SUCCESSFULLY -->
                        <div id="succMessage" class="text-success text-center"></div>
                        <form id="contact-form" method="post" action="{{ route('contact.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="name" id="txtName" class="form-control" placeholder="Your Name" required />
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="phone" id="txtPhone" class="form-control" placeholder="Your Phone" required />
                                </div>
                                <div class="col-md-12">
                                    <input type="email" name="email" id="txtEmail" class="form-control" placeholder="Your Email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" id="txtSubject" class="form-control" placeholder="Subject" required />
                            </div>
                            <div class="form-group">
                                <textarea type="text" name="message" id="txtMessage" class="form-control" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div><input onClick="getResponse()" class="btn" type="button" name="submits" id="submits" value="Send Message"></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="contact-map">
                        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.733248043701!2d-118.24532098539802!3d34.05071312525937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c648fa1d4803%3A0xdec27bf11f9fd336!2s123%20S%20Los%20Angeles%20St%2C%20Los%20Angeles%2C%20CA%2090012%2C%20USA!5e0!3m2!1sen!2sbd!4v1585634930544!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>-->
{{--                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7303.0857989157985!2d90.429003!3d23.7636744!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7f56a95a617%3A0x7c3d0ad7fd7cec31!2sSiraj%20Convention%20Center!5e0!3m2!1sen!2sus!4v1632936915724!5m2!1sen!2sus" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>--}}
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d569.7848044849685!2d90.45609589960921!3d23.69967330074721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0!2zMjPCsDQxJzU4LjIiTiA5MMKwMjcnMjAuOSJF!5e0!3m2!1sen!2sbd!4v1634672909912!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
