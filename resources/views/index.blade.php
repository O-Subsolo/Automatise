<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/logo-fav.png">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/jqvmap/jqvmap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.css" />
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/lib/jquery.gritter/css/jquery.gritter.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600">
    <script src="../../js/font-awesome.js"></script>
    <link rel="stylesheet" href="../../css/loading.css">
    <link rel="stylesheet" href="../../css/loading_bars.css">
    <link rel="stylesheet" href="../../css/common.css">


    @if(isset($links))
        @foreach($links as $link)
            <link rel="stylesheet" href="{{ $link }}" type="text/css">
        @endforeach
    @endif

</head>

<body>
<div class="be-wrapper be-fixed-sidebar">
    <nav class="navbar navbar-default navbar-fixed-top be-top-header">
        <div class="container-fluid">
            <div class="navbar-header"><a href="index.html" class="navbar-brand"></a></div>
            <div class="be-right-navbar">
                <ul class="nav navbar-nav navbar-right be-user-nav">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle">
                            <img src="assets/img/avatar.jpg" alt="Avatar">
                            <span class="user-name">Julio Ferreira</span>
                        </a>
                        <ul role="menu" class="dropdown-menu">
                            <li>
                                <div class="user-info">
                                    <div class="user-name">Julio Ferreira</div>
                                    <div class="user-position online">Online</div>
                                </div>
                            </li>
                            <li><a href="#"><span class="icon mdi mdi-settings"></span> Configuração da Conta</a></li>
                            <li><a href="#"><span class="icon mdi mdi-power"></span> Sair</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="page-title"><span>Dashboard</span></div>
                <ul class="nav navbar-nav navbar-right be-icons-nav">
                    <li class="dropdown"><a href="#" role="button" aria-expanded="false" class="be-toggle-right-sidebar"><span class="icon mdi mdi-settings"></span></a></li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
                        <ul class="dropdown-menu be-notifications">
                            <li>
                                <div class="title">Notifications<span class="badge">3</span></div>
                                <div class="list">
                                    <div class="be-scroller">
                                        <div class="content">
                                            <ul>
                                                <li class="notification notification-unread"><a href="#">
                                                        <div class="image"><img src="assets/img/avatar2.png" alt="Avatar"></div>
                                                        <div class="notification-info">
                                                            <div class="text"><span class="user-name">Jessica Caruso</span> accepted your invitation to join the team.</div><span class="date">2 min ago</span>
                                                        </div>
                                                    </a></li>
                                                <li class="notification"><a href="#">
                                                        <div class="image"><img src="assets/img/avatar3.png" alt="Avatar"></div>
                                                        <div class="notification-info">
                                                            <div class="text"><span class="user-name">Joel King</span> is now following you</div><span class="date">2 days ago</span>
                                                        </div>
                                                    </a></li>
                                                <li class="notification"><a href="#">
                                                        <div class="image"><img src="assets/img/avatar4.png" alt="Avatar"></div>
                                                        <div class="notification-info">
                                                            <div class="text"><span class="user-name">John Doe</span> is watching your main repository</div><span class="date">2 days ago</span>
                                                        </div>
                                                    </a></li>
                                                <li class="notification"><a href="#">
                                                        <div class="image"><img src="assets/img/avatar5.png" alt="Avatar"></div>
                                                        <div class="notification-info"><span class="text"><span class="user-name">Emily Carter</span> is now following you</span><span class="date">5 days ago</span></div>
                                                    </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer"> <a href="#">View all notifications</a></div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-apps"></span></a>
                        <ul class="dropdown-menu be-connections">
                            <li>
                                <div class="list">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/github.png" alt="Github"><span>GitHub</span></a></div>
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/bitbucket.png" alt="Bitbucket"><span>Bitbucket</span></a></div>
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/slack.png" alt="Slack"><span>Slack</span></a></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/dribbble.png" alt="Dribbble"><span>Dribbble</span></a></div>
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/mail_chimp.png" alt="Mail Chimp"><span>Mail Chimp</span></a></div>
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/dropbox.png" alt="Dropbox"><span>Dropbox</span></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer"> <a href="#">More</a></div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Dashboard</a>
            <div class="left-sidebar-spacer">
                <div class="left-sidebar-scroll">
                    <div class="left-sidebar-content">
                        <ul class="sidebar-elements">
                            <li class="active">
                                <a href="index.html">
                                    <i class="icon mdi mdi-home"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="divider">Vendas</li>

                            <li class="">
                                <a href="pv.html">
                                    <i class="icon mdi mdi-assignment-o"></i>
                                    <span>Pedido</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="ordem-servico.html">
                                    <i class="icon mdi mdi-assignment"></i>
                                    <span>Ordem de Serviço</span>
                                </a>
                            </li>

                            <li class="divider">Cadastro</li>

                            <li class="">
                                <a href="cliente-fornecedores.html">
                                    <i class="icon mdi mdi-account"></i>
                                    <span>Clientes</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="cliente-fornecedores.html">
                                    <i class="icon mdi mdi-accounts"></i>
                                    <span>Forncedores</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="produtos.html">
                                    <i class="icon mdi mdi-shopping-cart"></i>
                                    <span>Produtos</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="produtos.html">
                                    <i class="icon mdi mdi-cutlery"></i>
                                    <span>Serviços</span>
                                </a>
                            </li>

                            <li class="divider">Financeiro</li>

                            <li class="">
                                <a href="contas-a-receber.html">
                                    <i class="icon mdi mdi-money"></i>
                                    <span>Contas a Receber</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="contas-a-pagar.html">
                                    <i class="icon mdi mdi-balance-wallet"></i>
                                    <span>Contas a Pagar</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="extrato.html">
                                    <i class="icon mdi mdi-money"></i>
                                    <span>Extrato</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="bancos.html">
                                    <i class="icon mdi mdi-balance"></i>
                                    <span>Bancos</span>
                                </a>
                            </li>
                            <li class="parent">
                                <a href="#">
                                    <i class="icon mdi mdi-settings"></i>
                                    <span>Configuração</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="condicoes-pgt.html">Condiçoes de pagamentos</a>
                                    </li>
                                    <li>
                                        <a href="centro-de-custo.html">Centro de Custo</a>
                                    </li>
                                    <li>
                                        <a href="categoria.html">Categorias</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="progress-widget">
                <div class="progress-data"><span class="progress-value">60%</span><span class="name">Current Project</span></div>
                <div class="progress">
                    <div style="width: 60%;" class="progress-bar progress-bar-primary"></div>
                </div>
            </div>
        </div>
    </div>

    @include($route)

    <nav class="be-right-sidebar">
        <div class="sb-content">
            <div class="tab-navigation">
                <ul role="tablist" class="nav nav-tabs nav-justified">
                    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Chat</a></li>
                    <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Todo</a></li>
                    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Settings</a></li>
                </ul>
            </div>
            <div class="tab-panel">
                <div class="tab-content">
                    <div id="tab1" role="tabpanel" class="tab-pane tab-chat active">
                        <div class="chat-contacts">
                            <div class="chat-sections">
                                <div class="be-scroller">
                                    <div class="content">
                                        <h2>Recent</h2>
                                        <div class="contact-list contact-list-recent">
                                            <div class="user"><a href="#"><img src="assets/img/avatar1.png" alt="Avatar">
                                                    <div class="user-data"><span class="status away"></span><span class="name">Claire Sassu</span><span class="message">Can you share the...</span></div>
                                                </a></div>
                                            <div class="user"><a href="#"><img src="assets/img/avatar2.png" alt="Avatar">
                                                    <div class="user-data"><span class="status"></span><span class="name">Maggie jackson</span><span class="message">I confirmed the info.</span></div>
                                                </a></div>
                                            <div class="user"><a href="#"><img src="assets/img/avatar3.png" alt="Avatar">
                                                    <div class="user-data"><span class="status offline"></span><span class="name">Joel King </span><span class="message">Ready for the meeti...</span></div>
                                                </a></div>
                                        </div>
                                        <h2>Contacts</h2>
                                        <div class="contact-list">
                                            <div class="user"><a href="#"><img src="assets/img/avatar4.png" alt="Avatar">
                                                    <div class="user-data2"><span class="status"></span><span class="name">Mike Bolthort</span></div>
                                                </a></div>
                                            <div class="user"><a href="#"><img src="assets/img/avatar5.png" alt="Avatar">
                                                    <div class="user-data2"><span class="status"></span><span class="name">Maggie jackson</span></div>
                                                </a></div>
                                            <div class="user"><a href="#"><img src="assets/img/avatar6.png" alt="Avatar">
                                                    <div class="user-data2"><span class="status offline"></span><span class="name">Jhon Voltemar</span></div>
                                                </a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-input">
                                <input type="text" placeholder="Search..." name="q"><span class="mdi mdi-search"></span>
                            </div>
                        </div>
                        <div class="chat-window">
                            <div class="title">
                                <div class="user"><img src="assets/img/avatar2.png" alt="Avatar">
                                    <h2>Maggie jackson</h2><span>Active 1h ago</span>
                                </div><span class="icon return mdi mdi-chevron-left"></span>
                            </div>
                            <div class="chat-messages">
                                <div class="be-scroller">
                                    <div class="content">
                                        <ul>
                                            <li class="friend">
                                                <div class="msg">Hello</div>
                                            </li>
                                            <li class="self">
                                                <div class="msg">Hi, how are you?</div>
                                            </li>
                                            <li class="friend">
                                                <div class="msg">Good, I'll need support with my pc</div>
                                            </li>
                                            <li class="self">
                                                <div class="msg">Sure, just tell me what is going on with your computer?</div>
                                            </li>
                                            <li class="friend">
                                                <div class="msg">I don't know it just turns off suddenly</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-input">
                                <div class="input-wrapper"><span class="photo mdi mdi-camera"></span>
                                    <input type="text" placeholder="Message..." name="q" autocomplete="off"><span class="send-msg mdi mdi-mail-send"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" role="tabpanel" class="tab-pane tab-todo">
                        <div class="todo-container">
                            <div class="todo-wrapper">
                                <div class="be-scroller">
                                    <div class="todo-content"><span class="category-title">Today</span>
                                        <ul class="todo-list">
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo1" type="checkbox" checked="">
                                                    <label for="todo1">Initialize the project</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo2" type="checkbox">
                                                    <label for="todo2">Create the main structure</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo3" type="checkbox">
                                                    <label for="todo3">Updates changes to GitHub</label>
                                                </div>
                                            </li>
                                        </ul><span class="category-title">Tomorrow</span>
                                        <ul class="todo-list">
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo4" type="checkbox">
                                                    <label for="todo4">Initialize the project</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo5" type="checkbox">
                                                    <label for="todo5">Create the main structure</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo6" type="checkbox">
                                                    <label for="todo6">Updates changes to GitHub</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo7" type="checkbox">
                                                    <label for="todo7" title="This task is too long to be displayed in a normal space!">This task is too long to be displayed in a normal space!</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-input">
                                <input type="text" placeholder="Create new task..." name="q"><span class="mdi mdi-plus"></span>
                            </div>
                        </div>
                    </div>
                    <div id="tab3" role="tabpanel" class="tab-pane tab-settings">
                        <div class="settings-wrapper">
                            <div class="be-scroller"><span class="category-title">General</span>
                                <ul class="settings-list">
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" checked="" name="st1" id="st1"><span>
                                                    <label for="st1"></label></span>
                                        </div><span class="name">Available</span>
                                    </li>
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" checked="" name="st2" id="st2"><span>
                                                    <label for="st2"></label></span>
                                        </div><span class="name">Enable notifications</span>
                                    </li>
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" checked="" name="st3" id="st3"><span>
                                                    <label for="st3"></label></span>
                                        </div><span class="name">Login with Facebook</span>
                                    </li>
                                </ul><span class="category-title">Notifications</span>
                                <ul class="settings-list">
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" name="st4" id="st4"><span>
                                                    <label for="st4"></label></span>
                                        </div><span class="name">Email notifications</span>
                                    </li>
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" checked="" name="st5" id="st5"><span>
                                                    <label for="st5"></label></span>
                                        </div><span class="name">Project updates</span>
                                    </li>
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" checked="" name="st6" id="st6"><span>
                                                    <label for="st6"></label></span>
                                        </div><span class="name">New comments</span>
                                    </li>
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" name="st7" id="st7"><span>
                                                    <label for="st7"></label></span>
                                        </div><span class="name">Chat messages</span>
                                    </li>
                                </ul><span class="category-title">Workflow</span>
                                <ul class="settings-list">
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" name="st8" id="st8"><span>
                                                    <label for="st8"></label></span>
                                        </div><span class="name">Deploy on commit</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>

<input type="hidden" id="list" value="@if(isset($list) && $list) 1 @else 0 @endif">
<input type="hidden" id="form" value="@if(isset($form) && $form) 1 @else 0 @endif">

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="assets/js/main.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
<script src="assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
<script src="assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
<script src="assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
<script src="assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>
<script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
<script src="assets/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="assets/js/app-dashboard.js" type="text/javascript"></script>

<!-- Form Scripts -->
<script src="assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
<script src="assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
<script src="assets/js/app-form-elements.js" type="text/javascript"></script>
<script src="assets/lib/jquery.gritter/js/jquery.gritter.js" type="text/javascript"></script>
<script src="assets/js/app-ui-notifications.js" type="text/javascript"></script>
<script src="assets/lib/jquery.maskedinput/jquery.maskedinput.min.js" type="text/javascript"></script>
<script src="assets/js/app-form-masks.js" type="text/javascript"></script>
<!-- End Form Scripts -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--===============================================================================================-->
<script src="../../js/common.js"></script>
<script src="../../js/loading.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<!--===============================================================================================-->
<script type='text/javascript' src='//igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@if(isset($scripts))
    @foreach($scripts as $script)
        <script src="{{ $script }}" type="text/javascript"></script>
    @endforeach
@endif

@if(Session::has('success.msg'))
    <script>
        $(function (){
            sweet_alert_success('{!! Session::get('success.msg') !!}')
        });
    </script>

@elseif(Session::has('error.msg'))
    <script>
        $(function (){
            sweet_alert_error('{!! Session::get('error.msg') !!}')
        });
    </script>
@endif

@if(isset($active) && $active == 0)
    <input type="hidden" id="inactive" value="1">
    <script>resize_options_buttons()</script>
@endif

<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.dashboard();

        if($("#form").val() == 1){
            App.formElements();
            App.masks();
        }

        if($("#list").val() == 1)
            App.dataTables();
    });
</script>


</body>

</html>
