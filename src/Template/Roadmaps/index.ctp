<section class="first-section-margin mb-xl" id="roadmap-text">
    <img src="/img/road-1.png" alt="" id="road-1">
    <img src="/img/road-2.png" alt="" id="road-2">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>
                    Planned Roadmap
                </h1>
                <p class="text-grey">
This is the list of bugs and functionalities we want to get done at some point - we keep three work queues: Long term (stuff we will some day do), Short Term (things we will most likely do in the next couple of months) and Next Release (things we are doing right now). The roadmap is influenced by our enterprise customers support and forum suggestions, if you are a community user please use our contact form to share any bug or idea.
                </p>
            </div>
        </div>
    </div>
</section>

<section id="roadmap" class="footer-margin">
    <div class="container">
        <?php
        $roadmap = [];
        if (!empty($release)) {
            $roadmap[] = [
                'title' => "Stuff we are working for the next release ({$release->title}) due for ({$release->due_on})",
                'issues' => $release->github_issues
            ];
        }
        if (!empty($shortTerm)) {
            $roadmap[] = [
                'title' => "Short term plans (next couple of months perhaps?)",
                'issues' => $shortTerm->github_issues
            ];
        }
        if (!empty($longTerm)) {
            $roadmap[] = [
                'title' => "Long term plans (next 12 months perhaps?)",
                'issues' => $longTerm->github_issues
            ];
        }
        ?>

        <?php foreach ($roadmap as $rm): ?>
        <div class="roadmap-release mb-xl">
            <h3><?= $rm['title'] ?></h3>
            <?php foreach ($rm['issues'] as $issue): ?>
            <p class="text-grey roadmap-item">
                <strong class="roadmap-item-title"><?= $issue->title ?></strong>
                <?php foreach ($issue->github_issue_labels as $label): ?>
                <span class="roadmap-tag" style="background: #<?= $label['color'] ?>;"><?= $label->name ?></span>
                <?php endforeach; ?>
                <br>
                #<?= $issue->number ?> Opened on <?= $issue->created_at ?> by <?= $issue->owner ?>
            </p>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>
