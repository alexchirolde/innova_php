<html lang="en">
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
{*                    {# <form action="/messages/new" method="post"> #}*}
                    <input type="hidden" id="messageText" name="messageText">
                    <div id="quill"></div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" id="send-message" class="btn btn-secondary">
                            Enviar respuesta
                        </button>
                    </div>
{*                    {# </form> #}*}
                </div>
            </main>
        </div>
    </div>
</div>
<script type="application/javascript" src="views/js/jquery.min.js"></script>
<script type="application/javascript" src="views/js/bootstrap.min.js"></script>
<script type="application/javascript" src="views/js/quill.min.js"></script>
<script type="application/javascript" src="views/js/main.js"></script>
</body>
</html>