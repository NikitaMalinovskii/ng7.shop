$(document).ready(function(){
  $('.count').prop('disabled', true);

  update_amounts();

  $('.cart-item-price span').on('keyup keypress blur change', function(e){
    update_amounts();
  });

  
});

function update_amounts(){
  var sum = 0;

  $('.cart-grid > ul > li').each(function(){
    var qty = $(this).find('.count').val();
    var price = parseInt($(this).find('.price').text());
    var amount = qty * price;
    sum += amount;
  });

  $('.total').text(sum);
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