
// onclick delete menu
function deleteconfirm($id){
    $confirm = confirm("Are you sure you want to delete this?");
    if($confirm == true){
        window.location.href = "/hapusmenu/" + $id;
    }
}
// onclick delete kedai
function deletekedaiconfirm($id){
    $confirm = confirm("Are you sure you want to delete this?");
    if($confirm == true){
        window.location.href = "/deletecafe/" + $id;
    }
}

//onclick delete admin
function deleteadminconfirm($id){
    $confirm = confirm("Are you sure you want to delete this?");
    if($confirm == true){
        window.location.href = "/deleteadmin/" + $id;
    }
}