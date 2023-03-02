<div class="container">
    <div class="modal fade" id="myModalRenew" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Renewal Alert!</h4>
                </div>
                <div class="modal-body text-center">
                    <p class="my-0 font-weight-bold">@lang('Are you sure you want to renew this application') ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('Close')</button>
                    <form class="btn-ok" action="" method="get">
                      
                        <button type="submit" class="btn btn-info">@lang('Renew')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#myModalRenew").on("show.bs.modal", function (e) {
            $(this).find(".btn-ok").attr("action", $(e.relatedTarget).data("href"));
        });
    });
</script>
