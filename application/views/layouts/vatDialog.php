<?php

use application\components\Cart;
?>
<div class="modal fade" id="vat" tabindex="-1" role="dialog" aria-labelledby="vat" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title "> Value Added Tax</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="/SafeRideStore/admin/changeVat" method="POST">
                        <div class="row">
                            Current Value Added Tax is &nbsp<b><?= Cart::getVat() * 100; ?>%</b>
                        </div>
                        <div class="row my-3">

                            <label for="inputvat">To Change Current Value Added Tax enter new value below:</label>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <input type="text" class="form-control " name="inputvat" aria-describedby="vatHelp" required oninput="this.value = this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');">
                            </div>
                            <div class=" col-1">%</div>

                            <div class="col-8">
                                <button type='submit' class="btn btn-primary" name="change" value="change">Change</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>