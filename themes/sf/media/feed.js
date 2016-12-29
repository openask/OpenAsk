/**
 * Created by liu on 23/12/2016.
 */

feed_load(0)

function feed_load(id)
{
    $.get('/feed?id=' + id)
        .done(function (resp) {
            console.log(resp)
        })
}