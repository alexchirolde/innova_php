(function (window, document, $) {
    'use strict';

    let chatWrapper = document.querySelector('.chat-wrapper');
    let conversationWrapper = document.querySelector('.conversations-wrapper');
    let conversationId, messageFromId;
    var messagesOffset = 0, conversationsOffset = 0, disableScroll = false, disableScrollConversations = false,
        limit = 0;


//  RETRIEVING MESSAGES OF A CONVERSATION
    $(document).on('click', '.participant-template', function (e) {
        e.preventDefault();
        $('.chat-wrapper').empty();
        $('.quill-editor').addClass('d-none');
        if ('content' in document.createElement('template')) {
            conversationId = $(this).attr('data-id');
            ajaxCall(chatWrapper, true, 0);
        } else {
            alert('Please upgrade your browser to support templates tag');
        }

    });
//  RETRIEVING MESSAGES ON SCROLLING INTO A CONVERSATION
    $('.chat-wrapper').scroll(function (e) {

        if ($(this).scrollTop() === 0) {
            messagesOffset += 5;
            if (!disableScroll)
                ajaxCall(chatWrapper, true, messagesOffset);

        }
    })

//  RETRIEVING CONVERSATIONS ON SCROLLING
    $('.conversations-wrapper').scroll(function (e) {
        if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight && !disableScrollConversations) {
            conversationsOffset += 15;
            loadConversations()
        }
    })


//  RETRIEVING CONVERSATIONS ON PAGE LOAD
    function loadConversations() {
        $.ajax({
            url: 'controllers/ConversationController.php',
            method: 'GET',
            async: 'false',
            data: {offset: conversationsOffset},
            success: function (response) {
                var data = $.parseJSON(response)
                if (data.length !== 1) {
                    var templateParticipant = document.querySelector('#participant-conversation');
                    for (let i = 0; i < data.length; i++) {
                        var cloneParticipant = templateParticipant.content.cloneNode(true);
                        var avatar = cloneParticipant.querySelector('img.avatar');
                        var participant = cloneParticipant.querySelector('.participant-template');

                        avatar.src = data[i]['avatar'];
                        participant.innerHTML = data[i]['name'];
                        participant.setAttribute('data-id', data[i]['conversationId']);

                        conversationWrapper.append(cloneParticipant);
                    }
                } else
                    disableScrollConversations = true;
            },
            error: function (xhr, status) {
                console.log(status)
                if (typeof this.statusCode[xhr.status] != 'undefined') {
                    return false;
                }
            },
            statusCode: {
                500: function (response) {
                    console.log(response)
                }
            }
        });
    }

//  RETRIEVING MESSAGES
    function ajaxCall(chatWrapper, scrolled, offset) {
        $.ajax({
            url: 'controllers/MessagesController.php',
            method: 'GET',
            async: 'false',
            data: {conversationId: conversationId, offset: offset},
            success: function (response) {
                var data = $.parseJSON(response)
                if (data.length !== 0) {
                    messageFromId = $('.participant-name');
                    $('.participant-avatar').attr('src', data[0]["avatar"]);
                    messageFromId.html(data[0]["messageFrom"]);
                    messageFromId.attr('data-id', data[0]["messageFromId"]);
                    messageFromId = messageFromId.attr('data-id');
                    $('.quill-editor').removeClass('d-none');

                    var templateFrom = document.querySelector('#message-from-template');
                    var templateTo = document.querySelector('#message-to-template');
                    for (let i = 0; i < data.length; i++) {
                        if (data[i][0].messageFromId !== undefined) {
                            var cloneFrom = templateFrom.content.cloneNode(true);
                            var messageFrom = cloneFrom.querySelector('.participant-name');
                            var messageFromDate = cloneFrom.querySelector('.date-time');
                            var messageFromText = cloneFrom.querySelector('.message-text');

                            messageFrom.innerHTML = data[i]["messageFrom"];
                            messageFromDate.innerHTML = data[i]["messageFromDateAdd"];
                            messageFromText.innerHTML = data[i]["messageFromText"];
                            chatWrapper.append(cloneFrom);
                        } else {
                            var cloneTo = templateTo.content.cloneNode(true);
                            var messageToDate = cloneTo.querySelector('.date-time');
                            var messageToText = cloneTo.querySelector('.message-text');

                            messageToDate.innerHTML = data[i]["messageFromDateAdd"];
                            messageToText.innerHTML = data[i]["messageFromText"];
                            chatWrapper.append(cloneTo);
                        }
                    }
                    if (scrolled) {
                        chatWrapper.scrollTop = chatWrapper.scrollHeight
                    }
                } else
                    disableScroll = true;
            },
            error: function (xhr, status) {
                if (typeof this.statusCode[xhr.status] != 'undefined') {
                    return false;
                }
            },
            statusCode: {
                500: function (response) {
                    var templateError = document.querySelector('#ajax-error');
                    var clone = templateError.content.cloneNode(true);
                    var messageError = clone.querySelector('.error-message');
                    messageError.innerHTML = 'An error has occurred! ' + response.statusText;
                    chatWrapper.append(clone);
                }
            }
        });
    };

//  QUILL EDITOR
    var options = {
        // debug: 'info',

        placeholder: 'Send a message...',
        readOnly: false,
        theme: 'snow'
    };
    var editor = new Quill('#quill', options);
//  SEND MESSAGE

    $('#send-message').on('click', function () {
        $('#messageText').val(editor.getContents())
        var data = {
            conversationId: conversationId,
            messageFrom: '1',
            messageTo: messageFromId,
            messageText: editor.getText(),
        };
        $.ajax({
            url: 'controllers/MessagesController.php',
            method: 'POST',
            data: data,
            async: 'false',
            success: function (response) {
                editor.setContents();
                ajaxCall(chatWrapper, true, 0);
            }

        });
    });

    $(document).ready(function () {
        //  RETRIEVING CONVERSATIONS FROM TEST_PARTICIPANT DEFINED IN config.php
        loadConversations();
        $('.conversations-wrapper').scrollTop(0);
    })
})(window, document, jQuery);
