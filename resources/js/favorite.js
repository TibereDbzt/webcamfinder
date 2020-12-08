import $ from 'jquery';

const container = $('.favorite-container');
const p_tag = $('.favorite-container p');
const icon = $('.favorite-container .star')
const id_cam = $('.favorite-container').data('camid');
const data = {"id_cam" : id_cam};
const is_favorite = $('.favorite-container').data('isfavorite');

function updateDOM (fav) {
  if (fav == 1) {
    container.addClass('added');
    $('.star').addClass('filled');
    p_tag.text('Added to your favorites !');
  } else {
    container.removeClass('added');
    icon.removeClass('filled');
    p_tag.text('Add to your favorites');
  }
}

function updateDB (url, state, action) {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type: "POST",
    url: url,
    data: data,
    success: () => {
      updateDOM(state);
    },
    error: (error) => {
      p_tag.text(`Webcam not ${action}, an error occurred :(`);
      console.log(error);
    }
  });
}

function clickFavorite () {
  container.on('click', () => {
    if (container.hasClass('added')) {
      updateDB('./../remove-favorite', 0, 'removed');
    } else {
      updateDB('./../add-favorite', 1, 'added');
    }
  })
}

updateDOM(is_favorite);
clickFavorite();
