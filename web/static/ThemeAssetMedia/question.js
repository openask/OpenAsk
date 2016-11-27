$(document)
    // 关注问题，
    // 如果已经关注，则取消关注，ajax 返回当前用户对该功能的关注状态，更新关注人数
    .on('click', '.cmd-follow-question', function () {
        var $this = $(this)
            , id = $this.closest('.post-header').data('id')
        OpenAsk.post('/question/follow?id=' + id, function (json) {
            if (json.status == 'followed') {
                // @todo i18n
                $this.text('已关注');
            } else {
                // @todo i18n
                $this.text('关注');
            }
            $this.closest('div').find('.count').text(json.count)
        })
    })
    // 收藏问题
    // 如果已经收藏，则取消收藏，ajax 返回当前用户对该功能的收藏状态，更新收藏人数
    .on('click', '.cmd-mark-question', function () {
        var $this = $(this)
            , id = $this.closest('.post-header').data('id')
        OpenAsk.post('/question/mark?id=' + id, function (json) {
            if (json.status == 'marked') {
                // @todo i18n
                $this.text('已收藏');
            } else {
                // @todo i18n
                $this.text('收藏');
            }
            $this.closest('div').find('.count').text(json.count)
        })
    })
