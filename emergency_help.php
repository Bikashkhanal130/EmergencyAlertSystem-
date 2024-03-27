<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="emergency_help.css">
 </head>
<body>
  <button type="button" class="btn btn-danger fixed-bottom m-4" id="help-button">Help</button>

  <div class="modal fade" id="helpModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Need Help?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Please provide details about your situation. Help is on the way!</p>
          <form id="helpForm">
            <textarea class="form-control" rows="3"></textarea>
            <a href="./send_alert.php" class="btn btn-primary mt-3">Send</a> 

          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="emergency.js"></script> </body>
</html>
