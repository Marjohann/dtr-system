//sweet alert notifications
function notification(title, message,text,value,status) {
    swal(title, message, status, {
        buttons: {
          catch: {
            text: text,
            value: value,
          }

        },
      })
      .then((value) => {
        switch (value) {

          case "success":
            window.location.reload(true);
            break;
            case "error":

            break;

        }
      });

  }