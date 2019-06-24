<?php
$documentationItems = [
    1 => [
        'title' => 'Lalala',
        'video' => [
            [
                'title' => 'Mankine video 1',
                'videoId' => 'Xa0Q0J5tOP0'
            ],
            [
                'title' => 'Tatkove video 2',
                'videoId' => 'taJ60kskkns'
            ]
        ],
        'relatedItems' => [2,3]
    ],
    2 => [
        'title' => 'Salala',
        'video' => [
            [
                'title' => 'Jou',
                'videoId' => 'taJ60kskkns'
            ],
        ],
        'relatedItems' => [1,3]
    ],
    3 => [
        'title' => 'Tralala',
        'video' => [
            [
                'title' => 'Ejou Jou Men',
                'videoId' => 'FG0fTKAqZ5g'
            ],
        ],
        'relatedItems' => []
    ],
];
?>

<script type="text/javascript">
var documentationItems = <?= json_encode($documentationItems) ?>;
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

<section class="mb-lg">
    <div class="container">
        <div class="row doc-list">

            <div class="col-lg-12">
                <h2 class="medium text-center text-left-md text-blue text-uppercase">
                    Learn the basics
                </h2>

                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <p class="text-grey text-center text-left-md">
                            These guides cover basic features and concepts used across the system, is really important you get familiarised with them before you start using eramba.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">1</div>
                    <h5>
                        Basic GRC Relationships
                    </h5>
                    <p>
                        Understand how eramba deals with GRC, this is a basic video even for the most experienced GRC professional.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">2</div>
                    <h5>
                        System Layout
                    </h5>
                    <p>
                        Learn how eramba modules are organised, what features are inside and what they do.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="2" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">3</div>
                    <h5>
                        Filters
                    </h5>
                    <p>
                        Learn how queries can be made, stored and notified in eramba.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="3" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">4</div>
                    <h5>
                        Graphical Reports
                    </h5>
                    <p>
                        Learn the two basic reporting methodologies and how you can customise your own reports.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">5</div>
                    <div class="enterprise">
                        Enterprise Only
                    </div>
                    <h5>
                        Notifications
                    </h5>
                    <p>
                        Learn about the different notification possibilities inside eramba, how they interact with filters and reports and and how they are configured.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="mb-lg">
    <div class="container">
        <div class="row doc-list">

            <div class="col-lg-12">
                <h2 class="medium text-center text-left-md text-blue text-uppercase">
                    Core Functionalities
                </h2>

                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <p class="text-grey text-center text-left-md">
                            Key GRC functionalities covered by eramba.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">1</div>
                    <h5>
                        Policy Management
                    </h5>
                    <p>
                        Document your policies, ensure they get review, publish them on a single portal, Etc.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">2</div>
                    <h5>
                        Controls & Audits
                    </h5>
                    <p>
                        Register internal controls and their testing, set notifications on deadlines, store testing evidence, Etc.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">3</div>
                    <h5>
                        Exception Management
                    </h5>
                    <p>
                        Keep record of every approval you give away and trigger notifications when they expire.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">4</div>
                    <h5>
                        Compliance Management
                    </h5>
                    <p>
                        Show how compliant you are to any standard or regulation to auditors and internal stakeholders.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">5</div>
                    <h5>
                        Risk Management
                    </h5>
                    <p>
                        Simplify Risk Management and its reviews to ensure it brings real value to your organisation.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">6</div>
                    <h5>
                        Data Flow Analysis
                    </h5>
                    <p>
                        Document each data flow, their controls, policies and people involved. Understand where your data is and how is protected.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">7</div>
                    <h5>
                        Incident Management
                    </h5>
                    <p>
                        Record and manage incidents systematically and link them to affected risks, assets, controls, Etc.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">8</div>
                    <h5>
                        Project Management
                    </h5>
                    <p>
                        Define and follow up on all projects that build and improve your GRC program.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="mb-lg">
    <div class="container">
        <div class="row doc-list">

            <div class="col-lg-12">
                <h2 class="medium text-center text-left-md text-blue text-uppercase">
                    Stand Alone Features
                </h2>

                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <p class="text-grey text-center text-left-md">
                            Additional functionalities that support the GRC organisation.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">1</div>
                    <h5>
                        Security Awareness
                    </h5>
                    <p>
                        Create multiple, Active Directory related awareness trainings with videos, multiple choices and more.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">2</div>
                    <div class="enterprise">
                        Enterprise Only
                    </div>
                    <h5>
                        Online Assessments
                    </h5>
                    <p>
                        Upload your questions and send them out so your suppliers can log in remotely and provide feedback.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">3</div>
                    <div class="enterprise">
                        Enterprise Only
                    </div>
                    <h5>
                        Automated Account Reviews
                    </h5>
                    <p>
                        Automate the process of reviewing user and roles accounts.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="mb-lg">
    <div class="container">
        <div class="row doc-list">

            <div class="col-lg-12">
                <h2 class="medium text-center text-left-md text-blue text-uppercase">
                    Advanced Features
                </h2>

                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <p class="text-grey text-center text-left-md">
                            Once you have learnt the basic features and modules in eramba you can focus on this more advanced features.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">1</div>
                    <div class="enterprise">
                        Enterprise Only
                    </div>
                    <h5>
                        Custom Fields
                    </h5>
                    <p>
                        Learn how to expand eramba forms to include your own fields and how this interacts with filters and notifications.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">2</div>
                    <h5>
                        CSV Imports
                    </h5>
                    <p>
                        Learn how to CSV import data into eramba.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">3</div>
                    <h5>
                        KPI Dashboards
                    </h5>
                    <p>
                        Shows relevant filters counters for most of the modules in the system.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">4</div>
                    <h5>
                        REST APIs
                    </h5>
                    <p>
                        Learn how REST APIs can be used to consume data to and from eramba.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <div class="number">5</div>
                    <h5>
                        Access Management
                    </h5>
                    <p>
                        Learn how to create user accounts, connect eramba to an LDAP Directory, limit access to groups, enforce limits to who can see what, Etc.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="mb-lg">
    <div class="container">
        <div class="row doc-list">

            <div class="col-lg-12">
                <h2 class="medium text-center text-left-md text-blue text-uppercase">
                    Implementation Guides
                </h2>

                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <p class="text-grey text-center text-left-md">
                            The real key success factor in eramba is a well planned implementation. Read this guides to have at least one opinion on the matter.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <h5>
                        Compliance Management
                    </h5>
                    <p>
                        Describes the process we use to identify internal controls and policies that meets compliance requirements.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <h5>
                        Risk Management
                    </h5>
                    <p>
                        Describes a simple process to collect and analyse the information required by eramba to record organisational risks.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <h5>
                        Data Flow Analysis
                    </h5>
                    <p>
                        Describes a simple process to collect and analyse data flows and their associated internal controls and policies.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" class="video-modal-trigger" data-documentation-id="1" data-toggle="modal" data-target="#documentation-modal">Video</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="footer-margin">
    <div class="container">
        <div class="row doc-list">

            <div class="col-lg-12">
                <h2 class="medium text-center text-left-md text-blue text-uppercase">
                    Install & Configuration
                </h2>

                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <p class="text-grey text-center text-left-md">
                            Install from source or use our pre-installed VM and then understand basic access management features.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <h5>
                        Source Code Install
                    </h5>
                    <p>
                        Download our code and install the application on your Linux system using the source code.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                        <a href="#" target="_blank">Ubuntu (Vid)</a>
                        <a href="#" target="_blank">CentOS (Vid)</a>
                        <a href="#" target="_blank">RedHat (Vid)</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <h5>
                        VMware
                    </h5>
                    <p>
                        Use our pre-built VM image to minimise configuration settings.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="doc-item">
                    <h5>
                        Amazon AWS
                    </h5>
                    <p>
                        Use our Amazon AMI to quickly deploy eramba on the Cloud.
                    </p>
                    <div class="links">
                        <a href="#" target="_blank">Doc</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

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
                    <div id="documentation-modal-main-items" class="mb-xs">
                        <strong id="documentation-modal-main-item-title">
                        </strong>
                        <ul class="related-videos-list">
                        </ul>
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
