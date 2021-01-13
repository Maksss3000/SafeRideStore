<h2 class="title m-3">Log-In</h2>
<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class='text-danger font-weight-bold mb-2'><?= $vars['msg'] ?></div>
    </div>
    <div class="row justify-content-center">
        <form class="reg-form " action="/SafeRideStore/account/login" method="POST">
            <div class="form-group">
                <label for="inputUseName">User Name:</label>
                <input type="text" name="userName" class="form-control" id="inputUseName" class="form-control" aria-describedby="userNameHelp" required>
                <small id="userNameHelp" class="form-text text-muted">Enter your Usare Name
                </small>
            </div>

            <div class="form-group">
                <label for="inputPassword">Password:</label>
                <input type="password" name="password" class="form-control " id="inputPassword" class="form-control" aria-describedby="passwordHelp" required>
                <small id="passwordHelp" class="form-text text-muted">Enter your Password
                </small>
            </div>
            <div class="row">
                <a class="top-link " href="/SafeRideStore/account/register">Don't Have An Account?</a>
            </div>
            <button type='submit' class="btn btn-reg" name="login" value="login">Log-in</button>

        </form>
    </div>
</div>
</div>