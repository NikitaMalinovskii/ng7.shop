$.fn.removeText = function(){
  this.each(function(){

     // Get elements contents
     var $cont = $(this).contents();

      // Loop through the contents
      $cont.each(function(){
         var $this = $(this);

          // If it's a text node
          if(this.nodeType == 3){
            $this.remove(); // Remove it 
            return false;
          } else if(this.nodeType == 1){ // If its an element node
            $this.removeText(); //Recurse
          }
      });
  });
}



$(document).ready(function(){
  $('.count').prop('disabled', true);

  update_amounts();

  $('.cart-item-price span').on('keyup keypress blur change', function(e){
    update_amounts();
  });
  
  $("#product_description").contents().filter(function () {
     return this.nodeType === 3; 
  }).remove();
  
  $('#tableModal .modal-body').removeText();
  
});

function update_amounts(){
  var sum = 0;
  var post_sum = {};
  post_sum.subtotal = sum;

  $('.cart-grid > ul > li').each(function(){
    var qty = $(this).find('.count').val();
    var price = parseInt($(this).find('.price').text());
    var amount = qty * price;
    sum += amount;
  });

  $('.total').text(sum);
  
  $.ajax({
      url: "https://ng7.shop/cart.php",
      data: post_sum,
      type: 'post',
  });
}

var incrementQty;
var decrementQty;

var plusBtn = $('.plus');
var minusBtn = $('.minus');

var incrementQty = plusBtn.click(function(){
  var $n = $(this)
  .parent(".qty")
  .find(".count");

  $n.val(Number($n.val()) + 1);
  update_amounts();
});

var decrementQty = minusBtn.click(function(){
  var $n = $(this)
  .parent(".qty")
  .find(".count");

  var QtyVal = Number($n.val());

  if(QtyVal > 1){
    $n.val(QtyVal - 1);
  }

  update_amounts();
});

var $grid = $('.cards-grid').isotope({
  itemSelector: '.col',
  layoutMode: 'fitRows'
});

// bind filter button click
$('.filters-button-group').on( 'click', 'button', function() {
  var filterValue = $( this ).attr('data-filter');
  $grid.isotope({ filter: filterValue });
});

// change is-checked class on buttons
$('.button-group').each( function( i, buttonGroup ) {
  var $buttonGroup = $( buttonGroup );
  $buttonGroup.on( 'click', 'button', function() {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $( this ).addClass('is-checked');
  });
});
