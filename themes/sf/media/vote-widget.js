$(document)
// 对问题或者答案顶踩
// 不能对自己的问题或者回答顶踩
    .on('click', '.widget-vote .asc, .widget-vote .desc', function () {
        var $this = $(this)
            , $widget = $this.closest('.widget-vote')
            , $post = $this.closest('.post')
            , $count = $widget.find('.count')
            , id = $post.data('id')
            , type = $this.is('.asc') ? 'up' : 'down'
            , model = $post.data('model')
            , api = '/' + model + '/vote?type=' + type + '&id=' + id
        if ($widget.is('.disabled')) {
            OpenAsk.message('不能给自己顶踩')
            return
        }
        $.post(api, function (json) {
            if (json.success) {
                $count.text(json.data)
                if (type == 'up') {
                    $widget.toggleClass('voted-up')
                        .removeClass('voted-down')
                } else {
                    $widget.toggleClass('voted-down')
                        .removeClass('voted-up')
                }
            }
        })
    })
