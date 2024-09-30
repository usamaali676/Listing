
<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{asset('assets/scripts/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/jquery-migrate-3.3.2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/mmenu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/chosen.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/rangeslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/tooltips.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/dropzone.js')}}"></script>
{{-- <script src="{{ asset('assets/js/app.js') }}" defer></script> --}}

<!-- Leaflet // Docs: https://leafletjs.com/ -->

{{-- <script>
$(document).ready( function () {
    $('table').DataTable();
</script> --}}
// <!-- Opening hours added via JS (this is only for demo purpose) -->
<script>
$(".opening-day.js-demo-hours .chosen-select").each(function() {
	$(this).append(''+
        '<option></option>'+
        '<option>Closed</option>'+
        '<option>1 AM</option>'+
        '<option>2 AM</option>'+
        '<option>3 AM</option>'+
        '<option>4 AM</option>'+
        '<option>5 AM</option>'+
        '<option>6 AM</option>'+
        '<option>7 AM</option>'+
        '<option>8 AM</option>'+
        '<option>9 AM</option>'+
        '<option>10 AM</option>'+
        '<option>11 AM</option>'+
        '<option>12 AM</option>'+
        '<option>1 PM</option>'+
        '<option>2 PM</option>'+
        '<option>3 PM</option>'+
        '<option>4 PM</option>'+
        '<option>5 PM</option>'+
        '<option>6 PM</option>'+
        '<option>7 PM</option>'+
        '<option>8 PM</option>'+
        '<option>9 PM</option>'+
        '<option>10 PM</option>'+
        '<option>11 PM</option>'+
        '<option>12 PM</option>');
});
</script>
@php
    $state = \App\Models\State::all();
@endphp

<script>
    function newMenuItem() {
		var newElem = $('tr.pricing-list-item.pattern').first().clone();
		newElem.find('input').val('');
		newElem.appendTo('table#pricing-list-container');
	}

	if ($("table#pricing-list-container").is('*')) {
		$('.add-pricing-list-item').on('click', function(e) {
			e.preventDefault();
			newMenuItem();
		});

		// remove ingredient
		$(document).on( "click", "#pricing-list-container .delete", function(e) {
			e.preventDefault();
			$(this).parent().parent().remove();
		});

		// add submenu
		$('.add-pricing-submenu').on('click', function(e) {
			e.preventDefault();

			var newElem = $(''+
				'<tr class="pricing-list-item ">'+
					'<td>'+
						'<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>'+
                        '<input type="hidden" name="area_id[]" id="">'+
						'<div class="fm-input"><input type="text" placeholder="Area Name" name="areaserve[]" /></div>'+
						'<div class="fm-input"><input type="text" placeholder="Slug" name="area_slug[]" /></div>'+
                        '<div class="fm-input price-name"><select name="state_id[]" id="state"><option value="">Please Select</option>@foreach ($state as $item)<option value="{{$item->id}}">{{$item->name}}</option>@endforeach</select></div>'+
						'<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>'+
					'</td>'+
				'</tr>');

			newElem.appendTo('table#pricing-list-container');
		});

		$('table#pricing-list-container tbody').sortable({
			forcePlaceholderSize: true,
			forceHelperSize: false,
			placeholder : 'sortableHelper',
			zIndex: 999990,
			opacity: 0.6,
			tolerance: "pointer",
			start: function(e, ui ){
			     ui.placeholder.height(ui.helper.outerHeight());
			}
		});
 	}


    // Unit character
    var fieldUnit = $('.pricing-price').children('input').attr('data-unit');
    $('.pricing-price').children('input').before('<i class="data-unit">'+ fieldUnit + '</i>');



	/*----------------------------------------------------*/
	/*  Notifications
	/*----------------------------------------------------*/
	$("a.close").removeAttr("href").on('click', function(){

		function slideFade(elem) {
			var fadeOut = { opacity: 0, transition: 'opacity 0.5s' };
			elem.css(fadeOut).slideUp();
		}
		slideFade($(this).parent());

	});</script>

<script>
    function newMenuItem() {
		var newElem = $('tr.tag-list-item.pattern').first().clone();
		newElem.find('input').val('');
		newElem.appendTo('table#tag-list-container');
	}

	if ($("table#tag-list-container").is('*')) {
		$('.add-tag-list-item').on('click', function(e) {
			e.preventDefault();
			newMenuItem();
		});

		// remove ingredient
		$(document).on( "click", "#tag-list-container .delete", function(e) {
			e.preventDefault();
			$(this).parent().parent().remove();
		});

		// add submenu
		$('.add-tag-submenu').on('click', function(e) {
			e.preventDefault();

			var newElem = $(''+
				'<tr class="tag-list-item ">'+
					'<td>'+
						'<div class="ft-move"><i class="sl sl-icon-cursor-move"></i></div>'+
                        '<input type="hidden" name="tag_id[]" id="">'+
						'<div class="ft-input"><input type="text" placeholder="Tag Name" name="tag[]" /></div>'+
						'<div class="ft-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>'+
					'</td>'+
				'</tr>');

			newElem.appendTo('table#tag-list-container');
		});

		$('table#tag-list-container tbody').sortable({
			forcePlaceholderSize: true,
			forceHelperSize: false,
			placeholder : 'sortableHelper',
			zIndex: 999990,
			opacity: 0.6,
			tolerance: "pointer",
			start: function(e, ui ){
			     ui.placeholder.height(ui.helper.outerHeight());
			}
		});
 	}


    // Unit character
    var fieldUnit = $('.tag-price').children('input').attr('data-unit');
    $('.tag-price').children('input').before('<i class="data-unit">'+ fieldUnit + '</i>');



	/*----------------------------------------------------*/
	/*  Notifications
	/*----------------------------------------------------*/
	$("a.close").removeAttr("href").on('click', function(){

		function slideFade(elem) {
			var fadeOut = { opacity: 0, transition: 'opacity 0.5s' };
			elem.css(fadeOut).slideUp();
		}
		slideFade($(this).parent());

	});</script>

