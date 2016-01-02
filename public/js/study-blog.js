$(function() {
    t = $("#tagBox").tagging();
});
function addTag(tagName){
    $("#tagBox").tagging('add',tagName);
}

$('.add-tags-button').click(function(){
    addTag(this.text);
    this.addClass('disabled');
})

