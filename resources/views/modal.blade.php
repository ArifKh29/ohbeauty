<div class="modal fade" id="modaInputKoin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Scan Barcode Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('addData') }}" method="POST">
                @csrf
            <div class="modal-body">
                <input id="barcode" type="text" class="form-control" name="qrcode" required
                    placeholder="Klik Disini">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modaInputReward" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Scan Barcode Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('addDataReward') }}" method="POST">
                @csrf
            <div class="modal-body">
                <input id="barcode" type="text" class="form-control" name="qrcode" required
                    placeholder="Klik Disini">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Add an event listener for the modal shown event
    $('#modaInputKoin').on('shown.bs.modal', function() {
        // Add an event listener for the Enter key press
        $(document).on('keydown', function(e) {
            if (e.key === "Enter") {
                // Perform your desired action here
                // For example, close the modal
                $('#modaInputKoin').modal('hide');
                // Or call a JavaScript function
                // yourFunction();
            }
        });
    });

    // Remove the event listener when the modal is hidden
    $('#modaInputKoin').on('hidden.bs.modal', function() {
        $(document).off('keydown');
    });
</script>
<script>
    // Add an event listener for the modal shown event
    $('#modaInpuReward').on('shown.bs.modal', function() {
        // Add an event listener for the Enter key press
        $(document).on('keydown', function(e) {
            if (e.key === "Enter") {
                // Perform your desired action here
                // For example, close the modal
                $('#modaInpuReward').modal('hide');
                // Or call a JavaScript function
                // yourFunction();
            }
        });
    });

    // Remove the event listener when the modal is hidden
    $('#modaInpuReward').on('hidden.bs.modal', function() {
        $(document).off('keydown');
    });
</script>
<script>
    // Add an event listener for the modal shown event
    $('#modaInputKoin').on('shown.bs.modal', function() {
        // Add an event listener for the Enter key press
        $(document).on('keydown', function(e) {
            if (e.key === "Enter") {
                // Perform your desired action here
                // For example, close the modal
                $('#modaInputKoin').modal('hide');
                // Or call a JavaScript function
                // yourFunction();
            }
        });
    });

    // Remove the event listener when the modal is hidden
    $('#modaInputKoin').on('hidden.bs.modal', function() {
        $(document).off('keydown');
    });
</script>
