<!DOCTYPE html>
<html>

<head>
  <title>Create a Modal Popup using jQuery - Clue Mediator</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <style type="text/css">
    body {
      font-family: Helvetica, Arial, sans-serif;
    }

    p {
      font-size: 16px;
      line-height: 26px;
      letter-spacing: 0.5px;
      color: #4f4343;
    }

    /* Popup open button */
    .openBtn {
      color: #FFF;
      background: #269faf;
      padding: 10px;
      text-decoration: none;
      border: 1px solid #269faf;
      border-radius: 3px;
    }

    .openBtn:hover {
      background: #35c7db;
    }

    .popup {
      position: fixed;
      top: 0px;
      left: 0px;
      background: rgba(0, 0, 0, 0.58);
      width: 100%;
      height: 100%;
      display: none;
    }

    /* Popup inner div */
    .popup-content {
      width: 600px;
      margin: 0 auto;
      padding: 40px;
      margin-top: 100px;
      border-radius: 3px;
      background: #fff;
      position: relative;
    }

    /* Popup close button */
    .closeBtn {
      position: absolute;
      top: 5px;
      right: 12px;
      font-size: 17px;
      color: #7c7575;
      text-decoration: none;
    }
  </style>
</head>

<body>

  <h2>Create a Modal Popup using jQuery - <a href="https://www.cluemediator.com/" target="_blank" rel="noopener noreferrer">Clue Mediator</a></h2>
  <a class="openBtn" href="javascript:void(0)"> Click to open Popup </a>

  <div class="popup">
    <div class="popup-content">
      <h2 class="text-center">Edit Students</h2>
      <p>add my form</p>
      <a class="closeBtn" href="javascript:void(0)">x</a>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function () {

      // Open Popup
      $('.openBtn').on('click', function () {
        $('.popup').fadeIn(300);
      });

      // Close Popup
      $('.closeBtn').on('click', function () {
        $('.popup').fadeOut(300);
      });

      // Close Popup when Click outside
      $('.popup').on('click', function () {
        $('.popup').fadeOut(300);
      }).children().click(function () {
        return false;
      });

    });
  </script>

</body>

</html>