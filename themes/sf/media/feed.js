/**
 * Created by liu on 23/12/2016.
 */

var $wrap = $('#feed-wrap')

feed_load()

function feed_load(offset)
{
    offset = offset||''
    $.get('/feed?offset=' + offset)
        .done(function (resp) {
            $wrap.append(resp)
        })
}