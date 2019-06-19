<section class="first-section-margin mb-xl">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>
                    Releases
                </h1>
                <p class="text-grey">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
    </div>
</section>

<section id="releases" class="footer-margin">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 mb-md">
                <h2 class="text-blue">
                    Enterprise
                </h2>
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
                <h2 class="text-blue">
                    Community
                </h2>
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