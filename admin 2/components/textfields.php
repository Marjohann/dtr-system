<?php

function textField($label,$labelid,$name){
    echo '<div class = "form-group row">';
    echo '<label class = " col-form-label col-3"> '.$label.'  </label>';
    echo '<input type = "text" class = "form-control col-9 " onkeyup="this.value = this.value.toUpperCase();" required id = "'.$name.'" name = "'.$name.'" >';
    echo '<label id = "'.$labelid.'" style = "margin-left:115px;padding-top:5px;font-size:13px;color:red;font:Arial;"></label>';
    echo '</div>';
  }
  ?>