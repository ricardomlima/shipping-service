var $collectionHolder;

// setup an "add a shipping range" link
var $addShippingRangeLink = $('<a href="#" class="add_shipping_range_link">Add a Shipping Range</a>');
var $newLinkLi = $('<li></li>').append($addShippingRangeLink);

jQuery(document).ready(function() {
    // Get the ul that holds the collection of shipping-ranges
    $collectionHolder = $('ul.shipping-ranges');

    $collectionHolder.find('li').each(function() {
        addShippingRangeFormDeleteLink($(this));
    });

    // add the "add a shipping range" anchor and li to the shipping-ranges ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have, use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find('.shipping-range-row').length);

    $addShippingRangeLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new shipping range form
        addShippingRangeForm($collectionHolder, $newLinkLi);
    });
});

function addShippingRangeForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype
    var prototype = $('#shipping-range-template').html();

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a Shipping Range" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
}

function addShippingRangeFormDeleteLink($shippingRangeFormLi) {
    var $removeFormA = $('<a href="#">delete this shipping range</a>');
    $shippingRangeFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // remove the li for the shipping range form
        $shippingRangeFormLi.remove();
    });
}
