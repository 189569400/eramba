<?php
$this->assign('title', __('Releases | Eramba'));
?>
<section class="first-section-margin mb-xl">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center hidden-md">
                <img id="releases-img" src="/img/megaphone.png" alt="" class="img-fluid" width="250" style="transform: rotate(-12deg); margin-top: 20px; margin-left: -70px;">
            </div>
            <div class="col-lg-7">
                <h1>
                    Releases
                </h1>
                <p class="text-grey">
		This is the list of the last ten releases we have made public to both our enterprise and community releases. Updates reach out your eramba installation using the built in update functionality. 
                </p>
            </div>
        </div>
    </div>
</section>

<section id="releases" class="footer-margin">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 mb-md">
                <h3 class="text-blue text-center">
                    Enterprise
                </h3>
                <table>
                    <thead>
                        <tr>
                            <th width="30%">
                                Version
                            </th>
                            <th width="40%">

                                Release Date
                            </th>
                            <th width="30%">
                                Changelog
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($eReleases as $rls): ?>
                        <tr>
                            <td>
                                <?= $rls->version ?>
                            </td>
                            <td>
                                <?= date('F d, Y', strtotime($rls->release_date)) ?>
                            </td>
                            <td>
                                <span data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-trigger="hover" data-content="<?= nl2br($rls->changelog) ?>" data-template='<div class="popover popover-release" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'>
                                    Show
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-xl-5 offset-xl-1 mb-md">
                <h3 class="text-blue text-center">
                    Community
                </h3>
                <table>
                    <thead>
                        <tr>
                            <th width="30%">
                                Version
                            </th>
                            <th width="40%">

                                Release Date
                            </th>
                            <th width="30%">
                                Changelog
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                c1.0.6.052
                            </td>
                            <td>
                                March 19, 2018
                            </td>
                            <td>
                                <span data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-trigger="hover" data-content="<?= nl2br('TBD') ?>" data-template='<div class="popover popover-release" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'>
                                    Show
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                c1.0.6.001
                            </td>
                            <td>
                                March 24, 2016
                            </td>
                            <td>
                                <span data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-trigger="hover" data-content="<?= nl2br('This update is provided only to test out self-updates right after deployment to customers') ?>" data-template='<div class="popover popover-release" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'>
                                    Show
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                c1.0.6.000
                            </td>
                            <td>
                                March 23, 2016
                            </td>
                            <td>
                                <span data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-trigger="hover" data-content="<?= nl2br('First Community Package') ?>" data-template='<div class="popover popover-release" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'>
                                    Show
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
