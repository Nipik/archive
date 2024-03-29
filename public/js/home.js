document.addEventListener("DOMContentLoaded", function() {
    var comments = document.querySelectorAll(".comments-container .comment");
    var currentCommentIndex = 0;

    function showNextComment() {
      if (currentCommentIndex < comments.length) {
        comments[currentCommentIndex].style.opacity = "1";
        currentCommentIndex++;
        setTimeout(showNextComment, 5000);
      }
    }
    comments.forEach(function(comment) {
      comment.style.opacity = "0";
    });
    showNextComment();
  });


  function animateValue(className, start, end, duration) {
      var range = end - start;
      var current = start;
      var increment = end > start ? 1 : -1;
      var stepTime = Math.abs(Math.floor(duration / range));
      var elements = document.querySelectorAll('.' + className);
      var timer = setInterval(function() {
          current += increment;
          elements.forEach(function(element) {
              element.textContent = current;
          });
          if (current == end) {
              clearInterval(timer);
          }
      }, stepTime);
  }
  animateValue("statistic-value", 0, 100, 2000);
  animateValue("statistic-value", 0, 150, 2000);
  animateValue("statistic-value", 0, 80, 2000);
