@extends('layouts.master')
@section('content')
<div class="contentpanel">

    <div class="row profile-wrapper">
        <div class="col-xs-12 col-md-3 col-lg-2 profile-left">
            <div class="profile-left-heading">
                <ul class="panel-options">
                    <li><a><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                </ul>
                <a href="" class="profile-photo"><img class="img-circle img-responsive"
                        src="../images/photos/profilepic.png" alt=""></a>
                <h2 class="profile-name">Barbara Balashova</h2>
                <h4 class="profile-designation">Software Engineer</h4>
            </div>
            <div class="profile-left-body">

                <hr class="fadeout">
                                
                <h4 class="panel-title">Nama </h4>
                <p><i class="glyphicon glyphicon-briefcase mr5"></i> Awesome Company, Inc.</p>
                <hr class="fadeout">

                <h4 class="panel-title">Alamat</h4>
                <p><i class="glyphicon glyphicon-map-marker mr5"></i> San Francisco, CA, USA</p>


                <hr class="fadeout">

                <h4 class="panel-title">Kontak</h4>
                <p><i class="glyphicon glyphicon-phone mr5"></i> +1 010 123 5678</p>

                <hr class="fadeout">

                <h4 class="panel-title">Social</h4>
                <ul class="list-inline profile-social">
                    <li><a href=""><i class="fa fa-facebook-official"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                    <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                </ul>

            </div>
        </div>
        <div class="col-md-6 col-lg-8 profile-right">
            <div class="profile-right-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified nav-line">
                    <li class="active"><a href="#activity" data-toggle="tab"><strong>Activity</strong></a></li>
                    <li><a href="#photos" data-toggle="tab"><strong>Photos (20)</strong></a></li>
                    <li><a href="#music" data-toggle="tab"><strong>Music (10)</strong></a></li>
                    <li><a href="#places" data-toggle="tab"><strong>Places (5)</strong></a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="activity">

                        <div class="panel panel-post-item">
                            <div class="panel-heading">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img alt="" src="../images/photos/profilepic.png"
                                                class="media-object img-circle">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Barbara Balashova</h4>
                                        <p class="media-usermeta">
                                            <span class="media-time">July 06, 2015 8:30am</span>
                                        </p>
                                    </div>
                                </div><!-- media -->
                            </div><!-- panel-heading -->
                            <div class="panel-body">
                                <p>As a web designer it’s your job to help users find their way to what they’re looking
                                    for. It can be easy to put the needs of your users to one side, but knowing your
                                    users, understanding their roles, goals, motives and behavior will confirm how you
                                    structure your navigation model. <a href="http://goo.gl/QTccRE"
                                        target="_blank">#information</a> <a href="http://goo.gl/QTccRE"
                                        target="_blank">#design</a></p>
                                <p>Source: <a href="http://goo.gl/QTccRE" target="_blank">http://goo.gl/QTccRE</a></p>

                            </div>
                            <div class="panel-footer">
                                <ul class="list-inline">
                                    <li><a href=""><i class="glyphicon glyphicon-heart"></i> Like</a></li>
                                    <li><a><i class="glyphicon glyphicon-comment"></i> Comments (0)</a></li>
                                    <li class="pull-right">5 liked this</li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Write some comments">
                            </div>
                        </div><!-- panel panel-post -->

                        <div class="panel panel-post-item">
                            <div class="panel-heading">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img alt="" src="../images/photos/profilepic.png"
                                                class="media-object img-circle">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Barbara Balashova</h4>
                                        <p class="media-usermeta">
                                            <span class="media-time">July 05, 2015 11:33pm</span>
                                        </p>
                                    </div>
                                </div><!-- media -->
                            </div><!-- panel-heading -->
                            <div class="panel-body">
                                <p>Improving the trustworthiness of a website can help improve its conversion rate,
                                    whether we’re talking about buying a product, downloading an ebook or subscribing to
                                    a newsletter. <a href="">#trust</a> <a href="">#security</a></p>
                                <p>Source: <a href="http://goo.gl/LxDM8K" target="_blank">http://goo.gl/LxDM8K</a></p>
                            </div>
                            <div class="panel-footer">
                                <ul class="list-inline">
                                    <li><a href=""><i class="glyphicon glyphicon-heart"></i> Like</a></li>
                                    <li><a><i class="glyphicon glyphicon-comment"></i> Comments (0)</a></li>
                                    <li class="pull-right">0 liked this</li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Write some comments">
                            </div>
                        </div><!-- panel panel-post -->

                        <div class="panel panel-post-item">
                            <div class="panel-heading">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img alt="" src="../images/photos/profilepic.png"
                                                class="media-object img-circle">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Barbara Balashova <span>scheduled a meeting
                                                with</span> Elen Adarna</h4>
                                        <p class="media-usermeta">
                                            <span class="media-time">July 06, 2015 8:30am</span>
                                        </p>
                                    </div>
                                </div><!-- media -->
                            </div><!-- panel-heading -->
                            <div class="panel-body nopaddingbottom">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object width80" src="../images/image.png" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="">Telling Your Life Story: Memoir Workshop
                                                Series</a></h4>
                                        <p>Monday, July 06, 2015 - Tuesday, July 07, 2015 <br>
                                            SF Bay Theater <br>
                                            San Francisco, California, USA
                                        </p>
                                    </div>
                                </div>
                            </div><!-- panel-body -->
                        </div><!-- panel panel-post -->

                        <div class="panel panel-post-item">
                            <div class="panel-heading">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img alt="" src="../images/photos/profilepic.png"
                                                class="media-object img-circle">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Barbara Balashova <span>added new article from
                                                category</span> UI Workflow</h4>
                                        <p class="media-usermeta">
                                            <span class="media-time">July 06, 2015 8:30am</span>
                                        </p>
                                    </div>
                                </div><!-- media -->
                            </div><!-- panel-heading -->
                            <div class="panel-body nopaddingbottom">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object width80" src="../images/image.png" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="">Tips for Designing in the Browser</a></h4>
                                        <p>It's often thought that designing in the browser is a modern approach to web
                                            design. In fact, before the advent of tools such as Photoshop, there was
                                            little other choice --- <a href="http://goo.gl/SGfFJd"
                                                target="_blank">http://goo.gl/SGfFJd</a></p>
                                    </div>
                                </div>
                            </div><!-- panel-body -->
                        </div><!-- panel panel-post -->

                    </div><!-- tab-pane -->

                    <div class="tab-pane" id="photos">
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                        id est laborum.
                    </div>
                    <div class="tab-pane" id="music">
                        Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et
                        voluptates repudiandae sint et molestiae non recusandae.
                    </div>
                </div>
            </div>
        </div>
        
    </div><!-- row -->

</div><!-- contentpanel -->
@endsection