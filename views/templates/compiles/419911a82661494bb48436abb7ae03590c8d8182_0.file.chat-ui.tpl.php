<?php
/* Smarty version 3.1.38, created on 2021-01-25 20:33:20
  from '/Volumes/DATA/WORK/pruebas-php/views/templates/chat-ui.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.38',
  'unifunc' => 'content_600f2b10955769_50937475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '419911a82661494bb48436abb7ae03590c8d8182' => 
    array (
      0 => '/Volumes/DATA/WORK/pruebas-php/views/templates/chat-ui.tpl',
      1 => 1611605910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600f2b10955769_50937475 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="en">
<head>
    <title>Chat test</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="views/css/bootstrap-grid.min.css"/>
    <link rel="stylesheet" type="text/css" href="views/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="views/css/quill.snow.css"/>
    <link rel="stylesheet" type="text/css" href="views/css/quill.bubble.css"/>
    <link rel="stylesheet" type="text/css" href="views/css/main.css"/>

</head>
<body>
<header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar"></header>
<div class="container-fluid">
    <div class="container p-4 border border-dark main-wrapper">
        <div class="row flex-xl-nowrap">
            <aside class="col-12 col-md-3 col-xl-3 border-dark border p-3 overflow-auto conversations-wrapper">
                <template id="participant-conversation">
                    <div class="row my-2">
                        <div class="col-sm-3">
                            <img class="avatar" src="" alt="">
                        </div>
                        <div class="col-sm-9">

                            <a href="#" class="participant-template"
                               data-id=""></a>
                        </div>
                    </div>
                    <div class="border-dark border"></div>
                </template>
            </aside>
            <main class="col-12 col-md-9 col-xl-9 border-dark border p-3">
                <div class="row mb-3">
                    <div class="col-3">
                        <img class="participant-avatar" src="" alt="">
                    </div>
                    <div class="col-9">
                        <h3 class="participant-name" data-id=""></h3>
                    </div>
                </div>
                <div class="container">
                    <div class="row border border-dark chat-wrapper p-3">

                    </div>
                    <template id="message-from-template">
                        <div class="container border-dark border mb-2">
                            <div class="d-flex justify-content-between">
                                <p class="participant-name"></p>
                                <p class="date-time"></p>
                            </div>
                            <div>
                                <p class="message-text"></p>
                            </div>
                        </div>
                    </template>

                    <template id="message-to-template">
                        <div class="container border-dark border mb-2">
                            <div class="text-right">
                                <p class="date-time mb-0"></p>
                                <p class="">Yo</p>
                            </div>
                            <div>
                                <p class="message-text"></p>
                            </div>
                        </div>
                    </template>
                    <template id="ajax-error">
                        <div class="container border-danger border mb-2">
                            <div class="text-center">
                                <p class="text-danger error-message mb-0"></p>
                            </div>
                        </div>
                    </template>
                </div>
                <div class="container quill-editor d-none">
                    <input type="hidden" id="messageText" name="messageText">
                    <div id="quill"></div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" id="send-message" class="btn btn-secondary">
                            Enviar respuesta
                        </button>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 type="application/javascript" src="views/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="application/javascript" src="views/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="application/javascript" src="views/js/quill.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="application/javascript" src="views/js/main.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
