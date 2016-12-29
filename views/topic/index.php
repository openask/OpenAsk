
<div>
    <?=__FILE__?>
</div>

<div>
<button class="btn btn-default">按钮</button>
<button class="btn btn-primary">按钮</button>
<button class="btn btn-success">按钮</button>
<button class="btn btn-info">按钮</button>
<button class="btn btn-warning">按钮</button>
<button class="btn btn-danger">按钮</button>
</div>

<form>
    <a type="submit" class="btn btn-primary" disabled>提交</a>
</form>

<!-- Button trigger modal -->
<a type="button" class="btn btn-primary btn-lg disabled" data-toggle="modal" data-target="#myModal">
    Launch demo modal
</a>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>