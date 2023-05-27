$('.likeBtn').on('click', function(e) {
    e.preventDefault();
    let that = $(this);
    let postId = $(this).data('id');

    $.post("/api.php?p=like", { post_id: postId })
        .done(function(data) {
            if (data === "Like") {
                that.addClass('liked');
                updateLikesCount(postId, 1);
            } else if (data === "Dislike") {
                that.removeClass('liked');
                updateLikesCount(postId, -1);
            } else if (data === "Please Login") {
                alert("Please Login");
            }
        });
});

function updateLikesCount(postId, increment) {
    let likesElement = $('.likeBtn[data-id="' + postId + '"]');
    let likesCountElement = likesElement.find('.likesCount');
    let currentLikes = parseInt(likesCountElement.text());
    let newLikes = currentLikes + increment;
    likesCountElement.text(newLikes);
}

