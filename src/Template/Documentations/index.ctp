<script type="text/javascript">
var documentationItems = <?= $documentationItemsJson ?>;
</script>

<section id="documentation-intro" class="mb-xxxl first-section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12" id="documentation-intro-left">
                <div class="doc-video">
                    <iframe src="https://www.youtube.com/embed/1aQac28Sb3o" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col col-lg-4 offset-lg-1 col-md-12 mb-md" id="documentation-intro-right">
                <h1>
                    Welcome!
                </h1>
                <p class="text-grey">
                    Watch this informative video to get you started, it will not take more than 3 minutes.
                </p>
            </div>
        </div>
    </div>
</section>

<?php foreach ($docCategories as $key => $category): ?>
<section class=" <?= (count($docCategories) == ($key + 1)) ? 'footer-margin' : 'mb-lg' ?>">
    <div class="container">
        <div class="row doc-list">

            <div class="col-lg-12">
                <h2 class="medium text-center text-left-md text-blue text-uppercase">
                    <?= $category->title ?>
                </h2>

                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <p class="text-grey text-center text-left-md">
                            <?= $category->description ?>
                        </p>
                    </div>
                </div>
            </div>
            
            <?php foreach ($category->documentations as $documentation): ?>
            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number"><?= $documentation->number ?></div>
                    <?php if ($documentation->enterprise == 1): ?>
                    <div class="enterprise">
                        Enterprise Only
                    </div>
                    <?php endif; ?>
                    <h5>
                        <?= $documentation->title ?>
                    </h5>
                    <p>
                        <?= $documentation->description ?>
                    </p>
                    <div class="links">
                        <?php if (!empty($documentation->link)): ?>
                        <a href="<?= $documentation->link ?>" target="_blank">Doc</a>
                        <?php endif; ?>
                        <?php if (!empty($documentation->documentation_videos)): ?>
                        <a href="#" class="video-modal-trigger" data-documentation-id="<?= $documentation->id ?>" data-toggle="modal" data-target="#documentation-modal">Video</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<?php endforeach; ?>

<div class="modal fade" id="documentation-modal" tabindex="-1" role="dialog" aria-labelledby="documentationModal" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="documentation-modal-right">
                    <div class="doc-video">
                        <div id="documentation-modal-video"></div>
                    </div>
                </div>
                <div id="documentation-modal-left">
                    <div id="documentation-modal-main-item" class="mb-xs">
                    </div>

                    <div id="documentation-modal-related-items">
                        <strong>
                            Required Trainings
                        </strong>
                        <ul class="related-videos-list">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.youtube.com/iframe_api"></script>
