<div id="preview-bill">
    <div class="container">
        <div class="row">
            <div id="preview-bill-logo" class="col-xl-6 offset-xl-6 col-lg-6 offset-lg-5">
                <img src="/img/logo-e.png" alt="">
            </div>
        </div>
        <div class="row mb-lg">
            <div id="preview-bill-recipient" class="col-xl-6 col-lg-5 col-md-7 mb-xs">
                <h3>
                    QUOTE
                </h3>
                <?php if (isset($showUserInfo)): ?>
                <p>
                    <strong>
                        <?= $billingInfoData['company_name'] ?><br>
                        <?= $billingInfoData['name'] ?>&nbsp;<?= $billingInfoData['surname'] ?><br>
                        <?= $billingInfoData['company_address'] ?><br>
                        <?= $billingInfoData['city'] ?><br>
                        <?= $billingInfoData['zip_code'] ?><br>
                        <?= $billingInfoData['country_name'] ?><br>
                        <?= $billingInfoData['vat_number'] ?><br>
                        <?= $billingInfoData['email'] ?><br>
                    </strong>
                </p>
                <?php else: ?>
                <p class="text-blue">
                    <strong>
                        <i>* We will ask for your organisation details in the next step</i>
                    </strong>
                </p>
                <?php endif; ?>
            </div>
            <div id="preview-bill-details" class="col-xl-3 col-lg-3 col-md-5 mb-xs">
                <p>
                    <strong>Start Date</strong><br>
                    <?= $startDate ?><br>
                    <br>
                    <strong>Expiry</strong><br>
                    <?= $expiryDate ?><br>
                    <br>
                    <!-- <strong>Quote Number</strong><br>
                    QU-12345<br>
                    <br> -->
                    <!-- <strong>VAT Number</strong><br>
                    12345678 -->
                </p>
            </div>
            <div id="preview-bill-eramba" class="col-xl-3 offset-xl-0 col-lg-4 offset-lg-0 col-md-5 offset-md-7">
                <p>
                    eramba limited<br>
                    71-75 Shelton Street<br>
                    Covent Garden<br>
                    London<br>
                    WC2H9JQ<br>
                    ENGLAND
                </p>
            </div>
        </div>

        <table class="mb-lg">
            <thead>
                <tr class="border-black">
                    <th width="40%">Description</th>
                    <th>Quantity</th>
                    <th class="hidden-sm">Unit Price</th>
                    <th class="hidden-sm">VAT</th>
                    <th>Amount EUR</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr class="border-grey">
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td class="hidden-sm"><?= $item['unit_price_friendly'] ?></td>
                    <td class="hidden-sm"><?= $item['vat'] ?></td>
                    <td><?= $item['price_friendly'] ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td class="hidden-sm"></td>
                    <td class="hidden-sm"></td>
                    <td colspan="2">Subtotal</td>
                    <td><?= $priceSubtotalFriendly ?></td>
                </tr>
                <tr>
                    <td class="hidden-sm"></td>
                    <td class="hidden-sm"></td>
                    <td colspan="2" class="border-black">TOTAL NO VAT</td>
                    <td class="border-black"><?= $priceSubtotalFriendly ?></td>
                </tr>
                <tr>
                    <td class="hidden-sm"></td>
                    <td class="hidden-sm"></td>
                    <td colspan="2" class="border-black"><strong>TOTAL EUR</strong></td>
                    <td class="border-black"><strong><?= $priceTotalFriendly ?></strong></td>
                </tr>
            </tbody>
        </table>

        <table class="mb-sm">
            <thead>
                <tr class="border-black">
                    <th>Terms</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        IMPORTANT - BY SUBMITTING PAYMENT YOU ACCEPT OUR T&C<br>
                        Terms & Conditions: <a href="https://www.eramba.org/tc" target="_blank">www.eramba.org/tc</a><br>
                        <br>
                        Bank Details:<br>
                        <a href="https://www.eramba.org/payments" target="_blank">www.eramba.org/payments</a>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="text-right">
            <button class="btn btn-sm btn-primary-white" type="button" data-dismiss="modal">
                Close
            </button>
        </div>
    </div>
</div>
