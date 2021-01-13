<div class="modal fade" id="account" tabindex="-1" role="dialog" aria-labelledby="account" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title " id="account">Hello, <?= $_SESSION['fullName'] ?></h5>

                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid ">
                    <div class="row m-2">
                        <a class="nav-link top-link" href="/SafeRideStore/account/editAccount">
                            <span class="fas fa-user-edit"> </span> Edit Profile
                        </a>
                    </div>
                    <div class="row m-2">
                        <a class="nav-link top-link" href="#" data-toggle="modal" data-dismiss="modal" data-target="#changePass">
                            <span class="fas fa-lock"></span> Change Password</a>
                        </a>
                    </div>
                    <div class="row m-2">
                        <a class="nav-link top-link" href="/SafeRideStore/accaunt/orderHistory">
                            <span class="fas fa-clipboard-list"> </span> Order History
                        </a>
                    </div>
                    <div class="row m-2">
                        <a class="nav-link top-link" href="/SafeRideStore/cart">
                            <span class="fas fa-shopping-cart"> </span> Go To Cart
                        </a>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <div class="row m-2">
                            <a class="nav-link top-link" href="/SafeRideStore/account/logout">
                                <span class="fas fa-sign-out-alt"> </span> Log-Out
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="changePass" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title ">Change Password</h3>
                <button class="close resetChangePass" type="button" data-dismiss="modal"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <div id="successMassage" class="form-text text-success"></div>
                                    <label >Current Password:*</label>
                                    <input type="password" name="currentPassword" class="form-control" id="currentPassword" aria-describedby="userNameHelp" required>
                                    <small id="userNameHelp" class="form-text text-muted">Enter your Current Password</small>
                                    <div id="verifyMassage" class="form-text text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label >New Password:*</label>
                                    <input type="password" name="newPassword" class="form-control " id="newPassword" aria-describedby="passwordHelp" required>
                                    <small id="passwordHelp" class="form-text text-muted">Enter your New Password</small>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Confirm Password:*</label>
                                    <input type="password" name="confirmPassword" class="form-control " id="confirmPassword" aria-describedby="passwordHelp" required>
                                    <small id="passwordHelp" class="form-text text-muted">Repeat your New Password </small>
                                    <div id="confirmMassage" class="form-text text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-secondary resetChangePass" data-dismiss="modal">Close</button>
                            <a class="btn btn-primary"  id="changePassClick" href="#" value="change">Change</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>