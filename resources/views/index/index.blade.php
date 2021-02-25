<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="stylesheet" href="/static/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/css/index.css">
    <link rel="stylesheet" href="/static/Zico/css/zico.min.css">
    <title>首页</title>
</head>
<body>
    @csrf
    <div class="container-fluid box border-bottom">
        <div class="container head d-flex justify-content-between" >
            <ul class="nav head-nav d-flex justify-content-between">
                <li class="nav-item active text-center border-right border-left"><a href="" class="nav-link">起点中文网</a></li>
                <li class="nav-item"><a href="" class="nav-link">起点女生网</a></li>
                <li><em>|</em></li>
                <li class="nav-item"><a href="" class="nav-link">创世中文网</a></li>
                <li><em>|</em></li>
                <li class="nav-item"><a href="" class="nav-link">云起书院</a></li>
                <li><em>|</em></li>
                <li class="nav-item"><a href="" class="nav-link">繁体版</a></li>
            </ul>
            <ul class="nav head-login d-flex justify-content-around">
                <li class="nav-item active"><a href="" class="nav-link">登录</a></li>
                <li><em>|</em></li>
                <li class="nav-item"><a href="" class="nav-link">注册</a></li>
            </ul>
        </div>
    </div>
    
    <div class="container content">
        <!-- 广告01-->
        <div id="advertisement" class=" alert alert-dismissible fade show" role="alert">
            <img src="/static/images/g_1.jpg" alt="">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="search d-flex justify-content-between">
            <!-- logo -->
            <div class="logo">
                <a href="javascript:;"><img src="/static/images/qd_logo.png" alt="LOGO"></a>
            </div>
            <!-- 搜索框 -->
            <div class="search-input">
                <form class="form-inline">
                    <input id="search" class="form-control rounded-0" type="search" placeholder="我欲屠天" aria-label="Search">
                    <button class="btn btn-default rounded-0" type="submit"><i class="zi zi_search"></i></button>
                </form>
                <div id="hidden">
                    <ul class="list-group">
                        <li class="list-group-item text-left disabled"><a class="nav-link" href="#">大家都在搜</a> </li>
                        @foreach($search as $key=>$val)
                        <li class="list-group-item text-left"><a class="nav-link" href="#">{{isset($val['name'])?$val['name']:''}}</a> </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- 我的书架 -->
            <div class="mybook border">
                <a href="#" class="text-center nav-link">
                    <i class="zi zi_book" zico="书籍"></i>
                    <span>我的书架</span>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fulid box-2">
        <div class="container" id="content">
                <ul class="navbar">
                    @foreach($nav as $val)
                    <li class="nav-item"><a href="#" class="nav-link">{!!isset($val['ico'])?html_entity_decode($val['ico']):''!!}<span>{{$val['name']}}</span></a></li>
                    @endforeach
                </ul>
                <div id="box2" class="d-flex justify-content-between">
                    <div class="container content-2 border">
                        <div class="row row-cols-2" id="row">
                            @foreach($nav_items as $val)
                              <div class="col">
                                <div class="media float-left icon" data-id="{{$val['id']}}">
                                        {!!isset($val['ico'])?html_entity_decode($val['ico']):''!!}
                                        <div class="media-body text-center">
                                            <d>{{isset($val['name'])?$val['name']:''}}</d>
                                         <div>{{isset($val['num'])?$val['num']:''}}</div>
                                        </div>
                                    </div>
                              </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="content-3">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($lunbo as $val)
                                <li data-target="#myCarousel" data-slide-to="{{$val['sort']}}" {{$val['sort'] === 0?"class=active": ''}} >
                                    {!!isset($val['ico'])?html_entity_decode($val['ico']):''!!}<a href="#">{{isset($val['title'])?$val['title']:''}}</a>
                                </li>
                                @endforeach
                                <li data-target="#myCarousel" data-slide-to="{{$lunbo_num}}">
                                    <a href="#">•••</a>
                                </li>
                            </ol>
                            <div class="carousel-inner">
                                @foreach($lunbo as $val)
                                <div class="carousel-item {{$val['sort'] === 0?'active': ''}}" >
                                    <img src="{{isset($val['images'])?$val['images']:''}}" alt="" class="d-block w-100">
                                </div>
                                @endforeach
                            </div>
                            <a href="#myCarousel" class="carousel-control-prev" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a href="#myCarousel" class="carousel-control-next" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                        <!-- 广告02 -->
                        <div class="advertisement">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 text-center">
                                        <img src="/static/images/g_1.png" alt="">
                                    </div>
                                    <div class="col-lg-4 text-center bg">
                                        <img src="/static/images/g_2.png" alt="">
                                    </div>
                                    <div class="col-lg-4 text-center">
                                        <img src="/static/images/g_3.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-4">
                        <div class="border" id="list">
                                <h3 class="text-center"><a href="#">品品好书，犇腾过大年</a></h3>
                                <ul class="list-group list-group-flush">
                                    @foreach($news as $val)
                                        @if($val['cid'] === 1)
                                    <li class="list-group-item">
                                        <a href="#"  class="d-flex justify-content-between">
                                            <span><i>「</i><span>{{isset($val['cate'])?$val['cate']:''}}</span><i>」</i></span>
                                            <span>{{isset($val['name'])?$val['name']:''}}</span> 
                                        </a>
                                    </li>
                                        @elseif($val['cid'] === 2)
                                    <li class="list-group-item">
                                        <a href="#" class="d-flex justify-content-between">
                                            <span class="red">{{isset($val['cate'])?$val['cate']:''}}</span>
                                            <span class="red2">{{isset($val['name'])?$val['name']:''}}</span> 
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                        </div>
                        <div class="advertisement">
                            <a href="#">
                            <img src="/static/images/g_2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                
        </div>
    </div>

    <!-- <p>
        {{htmlentities('<i class="zi zi_tmTripadvisor" zico="猫途鹰"></i>')}}
    </p> -->
    <script src="/static/js/jquery.js"></script>
    <script src="/static/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
    <script src="/static/js/index.js"></script>
</body>
</html>