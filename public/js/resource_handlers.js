$.prototype.fieldVal=function(name){
    return this.children('input[name='+name+']').val();
}
function successCall(dialog){
    call=function(){
        dialog.html('<h1>done!</h1>');
    }
    return call;
}

function getDialog(element){
    return $(element).parents('.dialog-cont');
}

function handleResources(){
    $('input#add-place').click(function(e){
        e.preventDefault();
        var dialog=getDialog(this);
        add_place(
            dialog.fieldVal("name"),
            dialog.fieldVal("desc"),
            dialog.fieldVal("latitude"),
            dialog.fieldVal("longitude"),
            getUser(),
            dialog.fieldVal("submap_id"),
            successCall(dialog)
        );
    })
    $('input#update-place').click(function(e){
        e.preventDefault();
        var dialog=getDialog(this);
        update_place(
            dialog.fieldVal("id"),
            dialog.fieldVal("name"),
            dialog.fieldVal("desc"),
            dialog.fieldVal("latitude"),
            dialog.fieldVal("longitude"),
            getUser(),
            dialog.fieldVal("submap_id"),
            successCall(dialog)
        );
    })
    $('input#add-submap').click(function(e){
        e.preventDefault();
        var dialog=getDialog(this);
        add_submap(
            dialog.fieldVal("name"),
            dialog.fieldVal("desc"),
            dialog.fieldVal("alias"),
            successCall(dialog)
        );
    });
    $('input#update-submap').click(function(e){
        e.preventDefault();
        var dialog=getDialog(this);
        update_submap(
            dialog.fieldVal("id"),
            dialog.fieldVal("name"),
            dialog.fieldVal("desc"),
            dialog.fieldVal("alias"),
            successCall(dialog)
        );
    });
    $('input#delete-place').click(function(e){
        e.preventDefault();
        var dialog=getDialog(this);
        delete_place(
            dialog.fieldVal("id"),
            successCall(dialog));
    });
    $('input#delete-submap').click(function(e){
        e.preventDefault();
        var dialog=getDialog(this);
        delete_submap(
            dialog.fieldVal("id"),
            successCall(dialog));
    });
}