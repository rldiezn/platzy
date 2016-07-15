@extends('template.main-second')
@section('title')
    @lang('titles.home')
@stop
@section('content')
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">



        <!-- =========================================================== -->


        <!-- =========================================================== -->

        <!-- Small boxes (Stat box) -->


        <!-- =========================================================== -->


        <!-- =========================================================== -->



        <!-- =========================================================== -->

        <!-- Direct Chat -->







        <section class="content">

            <div class="row">
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div>
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div>
                            <div>
                            </div><!-- /.widget-user-image -->
                        </div>
                        <div>
                        </div>
                    </div><!-- /.widget-user -->
                </div><!-- /.col -->



                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                            <h3 class="widget-user-username"><?php echo Auth::user()->name ?></h3>
                            <h5 class="widget-user-desc"><?php echo Auth::user()->puesto ?></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="<?php echo Auth::user()->img_profile ?>" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">1,003</h5>
                                        <span class="description-text">Post</span>
                                    </div><!-- /.description-block -->
                                </div><!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">59</h5>
                                        <span class="description-text">Estrellas</span>
                                    </div><!-- /.description-block -->
                                </div><!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">32</h5>
                                        <span class="description-text">Amigos</span>
                                    </div><!-- /.description-block -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div>
                    </div><!-- /.widget-user -->
                </div><!-- /.col -->
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div>
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div>
                        </div>
                        <div>
                        </div>
                        <div>
                            <div class="row">
                                <div>
                                    <div>
                                    </div><!-- /.description-block -->
                                </div><!-- /.col -->
                                <div>
                                    <div>
                                    </div><!-- /.description-block -->
                                </div><!-- /.col -->
                                <div class="col-sm-4">
                                    <div>
                                    </div><!-- /.description-block -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div>
                    </div><!-- /.widget-user -->
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-md-6">
                    <!-- Box Comment -->
                    <div class="box box-widget">
                        <div class='box-header with-border'>
                            <div class='user-block'>
                                <img class='img-circle' src='{{asset('img/user1-128x128.jpg')}}' alt='user image'>
                                <span class='username'><a href="#">TU</a></span> <span class='description'>"Tarjetas de Presentación" </span>
                                <span class='description'>Compartido con "Todos"- Hace 5 minutos </span>
                            </div><!-- /.user-block -->
                            <div class='box-tools'>
                                <button class='btn btn-box-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-check-square-o' style=" color:#0b94f3
                    "></i></button>
                                <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                                <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class='box-body'>
                            <img class="img-responsive pad" src="{{asset('img/photo2.png')}}" alt="Photo">
                            <p>Hemos estado desvelandonos estos último días, pero creemos que el esfuerzo a valido la pena. Que opinan del nuevo diseño en las tarjetas de presentación?</p>
                            <button class='btn btn-default btn-xs'><i class='fa fa-share'></i> Compartir</button>
                            <button class='btn btn-default btn-xs'><i class='fa fa-thumbs-o-up'></i> Me Gusta</button>
                            <span class='pull-right text-muted'>38 Me Gusta - 2 Comentarios - (2)Compartir</span>
                        </div><!-- /.box-body -->
                        <div class='box-footer box-comments'>
                            <div class='box-comment'>
                                <!-- User image -->
                                <img class='img-circle img-sm' src='{{asset('img/user3-128x128.jpg')}}' alt='user image'>
                                <div class='comment-text'>
                      <span class="username">
                        Yuriko Hernandez
                        <span class='text-muted pull-right'>Hace 3 minutos</span>
                      </span><!-- /.username -->
                                    Están Increíbles! ¿Cuando nos las entregarán?
                                </div><!-- /.comment-text -->
                            </div><!-- /.box-comment -->
                            <div class='box-comment'>
                                <!-- User image -->
                                <img class='img-circle img-sm' src='{{asset('img/user4-128x128.jpg')}}' alt='user image'>
                                <div class='comment-text'>
                      <span class="username">
                       Samuel Cortés
                        <span class='text-muted pull-right'>Hace un momento</span>
                      </span><!-- /.username -->
                                    No cabe duda que nuestro departamento de Marketing y DG es el mejor.
                                </div><!-- /.comment-text -->
                            </div><!-- /.box-comment -->
                        </div><!-- /.box-footer -->
                        <div class="box-footer">
                            <form action="#" method="post">
                                <img class="img-responsive img-circle img-sm" src="{{asset('img/user1-128x128.jpg')}}" alt="alt text">
                                <!-- .img-push is used to add margin to elements next to floating images -->
                                <div class="img-push">
                                    <input type="text" class="form-control input-sm" placeholder="Escribir un comentario">
                                </div>
                            </form>
                        </div><!-- /.box-footer -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
                <div class="row">
                    <div class="col-md-6">
                        <!-- Box Comment -->
                        <div class="box box-widget">
                            <div class='box-header with-border'>
                                <div class='user-block'>
                                    <img class='img-circle' src='{{asset('img/user1-128x128.jpg')}}' alt='user image'>
                                    <span class='username'><a href="#">TU</a></span> <span class='description'>"Invitación Proveedor A"</span>
                                    <span class='description'>Compartido con "Todos"- Hace 5 minutos </span>
                                </div><!-- /.user-block -->
                                <div class='box-tools'>
                                    <button class='btn btn-box-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-check-square-o'style=" color:#0b94f3
                    "></i></button>
                                    <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                                    <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class='box-body'>
                                <img class="img-responsive pad" src="{{asset('img/photo2.png')}}" alt="Photo">
                                <p>Hemos estado desvelandonos estos último días, pero creemos que el esfuerzo a valido la pena. Que opinan del nuevo diseño en las tarjetas de presentación?</p>
                                <button class='btn btn-default btn-xs'><i class='fa fa-share'></i> Compartir</button>
                                <button class='btn btn-default btn-xs'><i class='fa fa-thumbs-o-up'></i> Me Gusta</button>
                                <span class='pull-right text-muted'>38 Me Gusta - 2 Comentarios - (2)Compartir</span>
                            </div><!-- /.box-body -->
                            <div class='box-footer box-comments'>
                                <div class='box-comment'>
                                    <!-- User image -->
                                    <img class='img-circle img-sm' src='{{asset('img/user3-128x128.jpg')}}' alt='user image'>
                                    <div class='comment-text'>
                      <span class="username">
                        Yuriko Hernandez
                        <span class='text-muted pull-right'>Hace 3 minutos</span>
                      </span><!-- /.username -->
                                        Están Increíbles! ¿Cuando nos las entregarán?
                                    </div><!-- /.comment-text -->
                                </div><!-- /.box-comment -->
                                <div class='box-comment'>
                                    <!-- User image -->
                                    <img class='img-circle img-sm' src='{{asset('img/user4-128x128.jpg')}}' alt='user image'>
                                    <div class='comment-text'>
                      <span class="username">
                       Samuel Cortés
                        <span class='text-muted pull-right'>Hace un momento</span>
                      </span><!-- /.username -->
                                        No cabe duda que nuestro departamento de Marketing y DG es el mejor.
                                    </div><!-- /.comment-text -->
                                </div><!-- /.box-comment -->
                            </div><!-- /.box-footer -->
                            <div class="box-footer">
                                <form action="#" method="post">
                                    <img class="img-responsive img-circle img-sm" src="{{asset('img/user1-128x128.jpg')}}" alt="alt text">
                                    <!-- .img-push is used to add margin to elements next to floating images -->
                                    <div class="img-push">
                                        <input type="text" class="form-control input-sm" placeholder="Escribir un comentario">
                                    </div>
                                </form>
                            </div><!-- /.box-footer -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->






                    <div class="col-md-6">
                        <!-- Box Comment -->
                        <div class="box box-widget">
                            <div class='box-header with-border'>
                                <div class='user-block'>
                                    <img class='img-circle' src='{{asset('img/user1-128x128.jpg')}}' alt='user image'>
                                    <span class='username'><a href="#">Ricardo Diez.</a></span><span class='description'> "Desarrollo de App"</span>
                                    <span class='description'>Compartido - Ayer 7:30 PM </span>
                                </div><!-- /.user-block -->
                                <div class='box-tools'>
                                    <button class='btn btn-box-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-check' style=" color:#f83c3c
                    "></i></button>
                                    <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                                    <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
                                    <small class="label pull-right bg-red">3</small>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class='box-body'>
                                <!-- post text -->
                                <p>Far far away, behind the word mountains, far from the
                                    countries Vokalia and Consonantia, there live the blind
                                    texts. Separated they live in Bookmarksgrove right at</p>
                                <p>the coast of the Semantics, a large language ocean.
                                    A small river named Duden flows by their place and supplies
                                    it with the necessary regelialia. It is a paradisematic
                                    country, in which roasted parts of sentences fly into
                                    your mouth.</p>

                                <!-- Attachment -->
                                <div class="attachment-block clearfix">
                                    <img class="attachment-img" src="{{asset('img/photo1.png')}}" alt="attachment image">
                                    <div class="attachment-pushed">
                                        <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>
                                        <div class="attachment-text">
                                            Description about the attachment can be placed here.
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
                                        </div><!-- /.attachment-text -->
                                    </div><!-- /.attachment-pushed -->
                                </div><!-- /.attachment-block -->

                                <!-- Social sharing buttons -->
                                <button class='btn btn-default btn-xs'><i class='fa fa-share'></i> Share</button>
                                <button class='btn btn-default btn-xs'><i class='fa fa-thumbs-o-up'></i> Like</button>
                                <span class='pull-right text-muted'>45 likes - 2 comments</span>
                            </div><!-- /.box-body -->
                            <div class='box-footer box-comments'>
                                <div class='box-comment'>
                                    <!-- User image -->
                                    <img class='img-circle img-sm' src='{{asset('img/user3-128x128.jpg')}}' alt='user image'>
                                    <div class='comment-text'>
                      <span class="username">
                        Maria Gonzales
                        <span class='text-muted pull-right'>8:03 PM Today</span>
                      </span><!-- /.username -->
                                        It is a long established fact that a reader will be distracted
                                        by the readable content of a page when looking at its layout.
                                    </div><!-- /.comment-text -->
                                </div><!-- /.box-comment -->
                                <div class='box-comment'>
                                    <!-- User image -->
                                    <img class='img-circle img-sm' src='{{asset('img/user5-128x128.jpg')}}' alt='user image'>
                                    <div class='comment-text'>
                      <span class="username">
                        Nora Havisham
                        <span class='text-muted pull-right'>8:03 PM Today</span>
                      </span><!-- /.username -->
                                        The point of using Lorem Ipsum is that it has a more-or-less
                                        normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English.
                                    </div><!-- /.comment-text -->
                                </div><!-- /.box-comment -->
                            </div><!-- /.box-footer -->
                            <div class="box-footer">
                                <form action="#" method="post">
                                    <img class="img-responsive img-circle img-sm" src="{{asset('img/user5-128x128.jpg')}}" alt="alt text">
                                    <!-- .img-push is used to add margin to elements next to floating images -->
                                    <div class="img-push">
                                        <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                                    </div>
                                </form>
                            </div><!-- /.box-footer -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div><!-- /.col -->
            </div><!-- /.row -->

        </section><!-- /.content -->

    </section>
@stop