<div class="modal fade" id="logIn" tabindex="-1" role="dialog" aria-labelledby="logIn" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title ">Log-In</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="/SafeRideStore/account/login" method="POST">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputUseName">User Name:</label>
                                    <input type="text" name="userName" class="form-control" id="inputUseName" aria-describedby="userNameHelp" required>
                                    <small id="userNameHelp" class="form-text text-muted">Enter your Usare Name
                                    </small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputPassword">Password:</label>
                                    <input type="password" name="password" class="form-control " id="inputPassword" aria-describedby="passwordHelp" required>
                                    <small id="passwordHelp" class="form-text text-muted">Enter your Password
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <a class="top-link " href="/SafeRideStore/account/register">Don't Have An Account?</a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type='submit' class="btn btn-reg" name="login" value="login">Log-in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>