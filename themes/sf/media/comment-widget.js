$(document)
    // 添加评论
    .on('submit', '.form-comment', function (e) {
        e.preventDefault()
        var $form = $(this)
            , $body = $form.find('[name="Comment[body]"]')
            , $field_body = $form.find('.field-comment-body')
            , $post = $form.closest('.post')
            , model = $post.data('model')
            , uuid = $post.data('uuid')
            , $commentBox = $post.find('.comment-box')
        if (($body.val().trim()) === '') {
            $body.val('')
            return false
        }
        $.post('/comment/create?puuid=' + uuid + '&comment_type=' + model, $form.serialize())
            .done(function (json) {
                if (json.errors) { // 评论失败
                    $field_body.find(".help-block").remove()
                    $.each(json.errors.body, function (idx, msg) {
                        $field_body.append(
                            '<div class="help-block">' + msg + '</div>'
                        )
                    })
                    $field_body.addClass('has-error')
                    return;
                }
                $commentBox.replaceWith(json.html)
                // @todo js 翻译
                $post.find('.comment-count').text((json.count_comment > 0 ? json.count_comment + ' ' : '') + '评论')
            })
        return false
    })
    // 回复评论
    .on('click', '.cmd-reply-comment', function () {
        var $this = $(this)
            , $comment = $this.closest('.comment-item')
            , $wraper = $this.closest('.widget')
            , comment_id = $comment.data('id')
            , author_display_name = $comment.data('author_display_name')
            , $form = $wraper.find('form')
            // @todo js 翻译
            , $div = $('<div class="replying"><span>回复：' + author_display_name + '</span><a href class="cmd-remove-reply">[x]</a></div>')
        // 删除之前点击的回复的人如果有的话
        $wraper.find('.replying').remove()
        // 在评论表单上面显示当前正在回复某人评论
        $div.insertBefore($form)
        // 表单里面插入回复数据
        $form.append('<input type="hidden" name="Comment[reply_comment_id]" value="' + comment_id + '">')
    })
    // 删除评论
    .on('click', '.cmd-delete-comment', function () {
        var $comment = $(this).closest('.comment-item ')
        OpenAsk.post('/comment/delete?uuid=' + $comment.data('uuid'))
            .done(function () {
                $comment.fadeOut(function () {
                    $comment.remove()
                })
            })
    })
    // 取消回复
    .on('click', '.cmd-remove-reply', function (e) {
        e.preventDefault()
        var $this = $(this)
            , $wraper = $this.closest('.widget')
        $wraper.find('[name="Comment[reply_comment_id]"]').remove()
        $wraper.find('.replying').remove()
    })
    // 对回复点赞
    .on('click', '.cmd-comment-vote', function () {
        var $this = $(this)
            , $comment = $this.closest('.comment-item')
            , $count = $comment.find('.count')
            , uuid = $comment.data('uuid')

        OpenAsk.post('/comment/like?uuid=' + uuid)
            .done(function (json) {
                if (json.success) {
                    if ($comment.hasClass('voted')) {
                        $comment.removeClass('voted')
                    } else {
                        $comment.addClass('voted')
                    }
                    $count.text('+' + json.data)
                    if (json.data <= 0) {
                        $count.removeClass('show')
                    }
                }
            })
    })
    // 打开或关闭评论框
    .on('click', '.cmd-toggle-comment', function () {
        var $this = $(this)
            , $post = $this.closest('.post')
            , loaded = $post.data('comment-loaded')
            , $commentBox = $post.find('.comment-box')

        $post.find('.expand-comments').remove()

        if (!loaded) { // 第一次点击展开
            var uuid = $post.data('uuid')
            $.get('/comment?uuid=' + uuid, function (html) {
                $post.data('comment-loaded', true)
                $commentBox.replaceWith(html)
                autosize($post.find('[name="Comment[body]"]'));
            })
        } else {
            if ($commentBox.is(':visible')) {
                $commentBox.hide()
            } else {
                $commentBox.show()
            }
        }
    })