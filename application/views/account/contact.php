<div class="container-fluid m-5 p-5">
    <div class="row ">
        <div class="col-lg-5 text-center">
            <form action="/SafeRideStore/message" method="POST">
                <h2 class="title">Send Us A Message</h2>

                <label class="label-" for="first-name">Tell us your name *</label>
                <input id="first-name" class="form-control mb-2" type="text" name="first-name" placeholder="First name" required>
                <input class="form-control" type="text" name="last-name" placeholder="Last name" required>
                <label class="l" for="email">Enter your email *</label>
                <input id="email" class="form-control" type="text" name="email" placeholder="Eg. example@email.com" required>
                <label class="" for="phone">Enter phone number</label>
                <input id="phone" class="form-control" type="text" name="phone" placeholder="Eg. +972 51236879" required>
                <label class="label-input100" for="message">Message *</label>
                <textarea id="message" class="form-control" name="message" placeholder="Write us a message" required></textarea>
                <button class="contact-form-btn mt-2">
                    Send Message
                </button>

            </form>
        </div>
        <div class="col-lg-5 text-center pr-5 ">
            <div class="contact-card" style="background-image: url('public/images/contact_img.jpg'); 
  background-size: cover;
  position: absolute;
  width: 100%;
  height: 100%;
 
  ">
                <div class="size p-4">
                    <div class="size1">
                        <span class="txt0 p-b-20">
                            Contact Us
                        </span>
                        <div class="txt2">
                            Fell free to drop us a line below
                        </div>
                    </div>
                </div>

                <div class="size1 p-3">
                    <span class="txt1 ">

                    </span>

                    <div class="flex-col size2">
                        <div class="txt1 p-b-20">
                            <i class="fa fa-phone"></i>
                            &nbsp Lets Talk
                        </div>

                        <div class="txt3">
                            +972 51236879
                        </div>
                    </div>
                </div>

                <div class="size1 p-3">

                    <div class="txt1 p-b-20">
                        <i class="fas fa-envelope"></i>
                        &nbsp General Support
                    </div>

                    <div class="txt3">
                        contact@example.com
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>