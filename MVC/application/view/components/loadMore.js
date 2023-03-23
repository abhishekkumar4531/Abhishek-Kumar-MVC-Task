$(document).on('click','#getStarted',function(e){
  $("#newPost").focus();
});

$( document ).ready(function() {
  $.ajax({
    type: "GET",
    url: "http://mvc-task.com/afterLogin/loadInitialContent",
    dataType: "html",
    success: function(data){
      $("#post-display").html(data);
    }
  });
});

$(document).on('click','#loadMore',function(e){
  $.ajax({
    type: "GET",
    url: "http://mvc-task.com/afterLogin/loadMoreContent",
    dataType: "html",
    success: function(data){
      $("#post-display").html(data);
    }
  });
});