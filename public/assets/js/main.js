function show(){
    document.getElementById('forms').classList.add('form_col2');
    $('#head').hide();
}
function hide(){
    document.getElementById('forms').classList.remove('form_col2');
    $('#head').show();

}

function show_head(f,g){
    var form=document.querySelector(f);
    var btn=document.querySelector(g);
    var btn_add=document.querySelector(g);
    form.style.display=form.style.display==="block"?"none":"block";
    btn.style.display=btn_add.style.display==="none"?"":"none";
}
function showw(){
    document.getElementById('formedit').classList.add('form_col2');
    document.getElementById('coll_show').hidden();
}
function hidee(){
    document.getElementById('formedit').classList.remove('form_col2');
    document.getElementById('coll_show').show();

}
function col(r){
    if(r==2){
    $('#college').hide();}
}
// if({{ $u }}=='2'){
// $('#college').hide();
// $('#departement').hide();
// }
