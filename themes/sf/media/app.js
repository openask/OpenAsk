var OpenAsk = {
    // 弹出提示框
    message: function (message) {
        var html = $('#message-box').html()
            ,$modal = $(html.replace('{{ message }}', message))
        $modal.modal('show')
    }
}
